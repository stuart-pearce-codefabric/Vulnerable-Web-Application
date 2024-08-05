import requests
import pytest

# Test for CommandExec-1.php
def test_command_exec_1():
    url = "http://localhost/CommandExecution/CommandExec-1.php"
    params = {"username": "ls", "password": ""}
    response = requests.get(url, params=params)
    assert "log1.txt" in response.text

# Test for CommandExec-2.php
def test_command_exec_2():
    url = "http://localhost/CommandExecution/CommandExec-2.php"
    params = {"typeBox": "ls"}
    response = requests.get(url, params=params)
    assert "log2.txt" in response.text

# Test for CommandExec-3.php
def test_command_exec_3():
    url = "http://localhost/CommandExecution/CommandExec-3.php"
    params = {"typeBox": "ls"}
    response = requests.get(url, params=params)
    assert "log3.txt" in response.text

# Test for CommandExec-4.php
def test_command_exec_4():
    url = "http://localhost/CommandExecution/CommandExec-4.php"
    params = {"typeBox": "ls"}
    response = requests.get(url, params=params)
    assert "log4.txt" in response.text

if __name__ == "__main__":
    pytest.main()
