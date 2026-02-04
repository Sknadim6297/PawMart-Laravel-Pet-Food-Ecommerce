<?php

namespace App\Services;

use Illuminate\Support\Collection;

class ExportService
{
    /**
     * Export data to CSV/Excel format
     */
    public static function toCSV($data, $filename, $headers = null)
    {
        $headers = $headers ?? [];
        
        // Create temp file
        $file = fopen('php://temp', 'r+');
        
        // Write headers if provided
        if (!empty($headers)) {
            fputcsv($file, $headers);
        }
        
        // Write data
        foreach ($data as $row) {
            if (is_object($row)) {
                $row = (array) $row;
            }
            fputcsv($file, $row);
        }
        
        // Get content
        rewind($file);
        $content = stream_get_contents($file);
        fclose($file);
        
        return response($content, 200, [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }
    
    /**
     * Export data to PDF format
     */
    public static function toPDF($html, $filename)
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        
        return response($mpdf->Output('', 'S'), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }
    
    /**
     * Generate HTML table from array data
     */
    public static function generateHTMLTable($headers, $rows, $title = '')
    {
        $html = '<html>';
        $html .= '<head>';
        $html .= '<meta charset="UTF-8">';
        $html .= '<style>';
        $html .= 'body { font-family: Arial, sans-serif; }';
        $html .= 'h2 { color: #333; text-align: center; }';
        $html .= 'table { width: 100%; border-collapse: collapse; margin-top: 20px; }';
        $html .= 'th { background-color: #fe5716; color: white; padding: 12px; text-align: left; font-weight: bold; }';
        $html .= 'td { padding: 10px; border-bottom: 1px solid #ddd; }';
        $html .= 'tr:nth-child(even) { background-color: #f9f9f9; }';
        $html .= 'tr:hover { background-color: #f5f5f5; }';
        $html .= '</style>';
        $html .= '</head>';
        $html .= '<body>';
        
        if ($title) {
            $html .= "<h2>{$title}</h2>";
        }
        
        $html .= '<table>';
        
        // Headers
        $html .= '<tr>';
        foreach ($headers as $header) {
            $html .= "<th>{$header}</th>";
        }
        $html .= '</tr>';
        
        // Rows
        foreach ($rows as $row) {
            $html .= '<tr>';
            if (is_array($row)) {
                foreach ($row as $value) {
                    $html .= "<td>" . htmlspecialchars($value ?? '') . "</td>";
                }
            } elseif (is_object($row)) {
                $rowArray = (array) $row;
                foreach ($rowArray as $value) {
                    $html .= "<td>" . htmlspecialchars($value ?? '') . "</td>";
                }
            }
            $html .= '</tr>';
        }
        
        $html .= '</table>';
        $html .= '</body>';
        $html .= '</html>';
        
        return $html;
    }
}
