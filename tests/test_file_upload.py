import pytest
import requests

def test_file_upload_lvl1():
    url = "http://localhost/FileUpload/fileupload1.php"
    files = {'file': ('test.php', '<?php echo "test"; ?>', 'application/x-php')}
    response = requests.post(url, files=files)
    assert "File uploaded /uploads/test.php" in response.text

def test_file_upload_lvl2():
    url = "http://localhost/FileUpload/fileupload2.php"
    files = {'file': ('test.php', '<?php echo "test"; ?>', 'application/x-php')}
    response = requests.post(url, files=files)
    assert "JPG, JPEG, PNG & GIF files are allowed." in response.text

def test_file_upload_lvl3():
    url = "http://localhost/FileUpload/fileupload3.php"
    files = {'file': ('test.php', '<?php echo "test"; ?>', 'application/x-php')}
    response = requests.post(url, files=files)
    assert "Mime?" in response.text
