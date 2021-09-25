<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query_1 = DB::select('
            SELECT T1.id_employee, T1.name, T1.address, T1.birth_date, T1.join_date
            FROM employees T1
            ORDER BY T1.join_date
            LIMIT 3
        ');

        $query_2 = DB::select('
            SELECT 	T1.id_employee,
                    T1.name,
                    T2.leave_date,
                    T2.reason
            FROM employees T1
                INNER JOIN leaves T2 ON T1.id_employee = T2.id_employee
            WHERE T1.deleted_at IS NULL AND
                T2.deleted_at IS NULL
            ORDER BY T1.id_employee
        ');

        $query_3 = DB::select('
            SELECT T1.id_employee, T1.name ,T2.leave_date, T2.leave_period, T2.reason
            FROM
                employees T1
            INNER JOIN LEAVES T2 ON
                T1.id_employee = T2.id_employee
            INNER JOIN(
                SELECT SUM(SUB1.leave_period) AS "leave_total",
                    SUB1.id_employee
                FROM LEAVES
                    SUB1
                WHERE
                    SUB1.deleted_at IS NULL AND SUB1.status = "Approved"
                GROUP BY
                    SUB1.id_employee
                HAVING
                    leave_total > 1
            ) T3 ON T1.id_employee = T3.id_employee
            WHERE T1.deleted_at IS NULL AND
                T2.deleted_at IS NULL
            ORDER BY T2.leave_date
        ');

        $query_4 = DB::select('
            SELECT
                T1.id_employee,
                T1.name,
                CASE WHEN T2.leave_total IS NOT NULL THEN 12 - T2.leave_total ELSE 12
            END AS "leave_quota"
            FROM
                employees T1
            LEFT JOIN(
                SELECT
                    SUM(SUB1.leave_period) AS "leave_total",
                    SUB1.id_employee
                FROM LEAVES
                    SUB1
                WHERE
                    SUB1.deleted_at IS NULL AND SUB1.status = "Approved"
                GROUP BY
                    SUB1.id_employee
            ) T2
            ON
                T1.id_employee = T2.id_employee
            WHERE
                T1.deleted_at IS NULL
            ORDER BY
                T1.id_employee
        ');

        return view('pages.admin.dashboard', [
            'total_employee' => Employee::count(),
            'total_leave' => Leave::count(),
            'pending_leave' => Leave::where('status', 'Pending')->count(),
            'report_1' => $query_1,
            'report_2' => $query_2,
            'report_3' => $query_3,
            'report_4' => $query_4,

        ]);
    }
}
