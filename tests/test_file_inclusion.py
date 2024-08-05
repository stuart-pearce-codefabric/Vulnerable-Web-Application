import pytest
import requests

def test_file_inclusion_lvl1():
    url = "http://localhost/FileInclusion/pages/lvl1.php?file=1.php"
    response = requests.get(url)
    assert "Why Dont You Click the Other Button??" in response.text

    url = "http://localhost/FileInclusion/pages/lvl1.php?file=2.php"
    response = requests.get(url)
    assert "Did you notice anything changed? Browse the site." in response.text

def test_file_inclusion_lvl2():
    url = "http://localhost/FileInclusion/pages/lvl2.php?file=1.php"
    response = requests.get(url)
    assert "Why Dont You Click the Other Button??" in response.text

    url = "http://localhost/FileInclusion/pages/lvl2.php?file=2.php"
    response = requests.get(url)
    assert "Did you notice anything changed? Browse the site." in response.text

def test_file_inclusion_lvl3():
    url = "http://localhost/FileInclusion/pages/lvl3.php?file=1"
    response = requests.get(url)
    assert "Why Dont You Click the Other Button??" in response.text

    url = "http://localhost/FileInclusion/pages/lvl3.php?file=2"
    response = requests.get(url)
    assert "Did you notice anything changed? Browse the site." in response.text

def test_file_inclusion_lvl4():
    url = "http://localhost/FileInclusion/pages/lvl4.php?file=1.php"
    response = requests.get(url)
    assert "Why Dont You Click the Other Button??" in response.text

    url = "http://localhost/FileInclusion/pages/lvl4.php?file=2.php"
    response = requests.get(url)
    assert "Did you notice anything changed? Browse the site." in response.text
