<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SyncController extends Controller
{
    
    public function sync()
    {
        $response = null;
system("ping -c 1 google.com", $response);
if($response == 0)
{
    $live_database = DB::connection('mysql-staging');
    $databaseName = DB::getDatabaseName();
    $tables = DB::select("SELECT * FROM information_schema.tables WHERE table_schema = '$databaseName'");
    
    foreach ($tables as $table) {
        $name = $table->TABLE_NAME;
        //if you don't want to truncate migrations
        if ($name == 'migrations') {
            continue;
        }

        $live_database->table($name)->delete();

        $data = DB::table($name)->get();

        foreach( $data as $data){
            // Save data to staging database - default db connection

            $live_database->table($name)->insert((array) $data);
        }
        return redirect()->back()->with('message','Successfully Synchronized');
    }

}
        else{
            return redirect()->back()->with('message2','Failed to Synchronize.Please Check Your Internet.');
        }
    }
}