<!DOCTYPE html>
<html>
<head>
    <title>Upload PDF</title>
</head>
<body>
    <h2>Upload PDF</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="pdf" required>
        <input type="submit" value="Upload">
    </form>
    <h2>Download PDF</h2>
    <a href="download.php?id=1" target="_blank">
        <button>Download PDF</button>
    </a>
</body>
</html>
