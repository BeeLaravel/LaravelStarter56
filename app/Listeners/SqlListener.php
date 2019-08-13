<?php
namespace App\Listeners;

use Illuminate\Database\Events\QueryExecuted;

class SqlListener {
    public function __construct() {}

    public function handle(QueryExecuted $event) {
        $sql = str_replace("?", "'%s'", $event->sql);
        // $sql = vsprintf($sql, $event->bindings);
        $log = '[' . date('Y-m-d H:i:s') . '] ' . $sql . "\r\n";
        $filepath = storage_path('logs'.DIRECTORY_SEPARATOR.'sql.log');
        file_put_contents($filepath, $log, FILE_APPEND);
    }
}
// $sql = \DB::table('my_table')->select()->tosql();

// \DB::connection()->enableQueryLog();
// \DB::table('my_table')->insert($data);
// $logs = \DB::getQueryLog();
// dd($logs);

// \DB::listen(function($query) {
//     $bindings = $query->bindings;
//     $sql = $query->sql;
//     foreach ( $bindings as $replace ) {
//         $value = is_numeric($replace) ? $replace : "'".$replace."'";
//         $sql = preg_replace('/\?/', $value, $sql, 1);
//     }
//     dd($sql);
// });
