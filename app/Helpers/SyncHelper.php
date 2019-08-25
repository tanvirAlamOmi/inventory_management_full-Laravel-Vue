<?php

if (!function_exists('sync')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function sync($table)
    { 
if(1===2){
        $localDB= DB::connection( 'mysql');
        $remoteDB=DB::connection( 'mysql-staging');

        $remoteDB->table($table)->delete();
        foreach($localDB->table($table)->get() as $data){
            $remoteDB->table($table)
                ->insert((array) $data);
        }
    }
    else{
        return back();
    }
}
}
