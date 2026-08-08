<?php
// Direct file server untuk menggantikan symlink storage
// Digunakan pada hosting LiteSpeed yang memblokir symlink

$file = $_GET['file'] ?? '';

// Security: hanya izinkan path yang aman, cegah directory traversal
$file = str_replace(['..', '\\', "\0"], '', $file);
$file = ltrim($file, '/');

$basePath = dirname(__DIR__) . '/storage/app/public/';
$fullPath = $basePath . $file;

// Pastikan file ada dan masih di dalam folder yang diizinkan
if (!$file || !file_exists($fullPath) || !is_file($fullPath)) {
    http_response_code(404);
    exit('File not found');
}

// Pastikan path tidak keluar dari basePath (keamanan tambahan)
$realBase = realpath($basePath);
$realFile = realpath($fullPath);
if (!$realFile || strpos($realFile, $realBase) !== 0) {
    http_response_code(403);
    exit('Forbidden');
}

// Kirim file dengan content-type yang tepat
$ext = strtolower(pathinfo($realFile, PATHINFO_EXTENSION));
$mimes = [
    'jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg',
    'png' => 'image/png', 'gif' => 'image/gif',
    'webp' => 'image/webp', 'svg' => 'image/svg+xml',
    'pdf' => 'application/pdf',
];
$mime = $mimes[$ext] ?? 'application/octet-stream';

header('Content-Type: ' . $mime);
header('Cache-Control: public, max-age=86400');
header('Content-Length: ' . filesize($realFile));
readfile($realFile);
