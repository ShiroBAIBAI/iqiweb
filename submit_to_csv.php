<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $consent = isset($_POST['consent']) ? 'Yes' : 'No';

    // 打开或创建CSV文件
    $file = fopen("submissions.csv", "a");
    fputcsv($file, [$name, $email, $phone, $consent]);
    fclose($file);

    // 设置PDF文件路径
    $pdfFile = 'source/tryme.pdf';

    // 检查文件是否存在
    if (file_exists($pdfFile)) {
        // 发送下载头部
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . basename($pdfFile) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($pdfFile));
        readfile($pdfFile);
        exit;
    } else {
        echo "Error: PDF file not found.";
    }
    // 打开或创建CSV文件
    $file = fopen("submissions.csv", "a");
    fputcsv($file, [$name, $email, $phone, $consent]);
    fclose($file);

    // 设置CSV文件路径
    $file = 'user_data.csv';

    // 打开文件，若文件不存在则创建文件
    $handle = fopen($file, 'a');

    // 写入数据到CSV文件
    fputcsv($handle, [$name, $email, $phone]);

    // 关闭文件
    fclose($handle);

    // 返回成功消息
    echo "数据保存成功";

    // 重定向到下载页面
    header("Location: index.html");
    exit();
} else {
    echo "非法访问";
}
?>
