import pytest
import requests

# Test for XSS vulnerability in XSS_level1.php
def test_xss_level1():
    url = "http://localhost/XSS/XSS_level1.php"
    payload = {"username": "<script>alert('XSS')</script>"}
    response = requests.get(url, params=payload)
    assert "<script>alert('XSS')</script>" in response.text

# Test for XSS vulnerability in XSS_level2.php
def test_xss_level2():
    url = "http://localhost/XSS/XSS_level2.php"
    payload = {"username": "<script>alert('XSS')</script>"}
    response = requests.get(url, params=payload)
    assert "<script>alert('XSS')</script>" not in response.text

# Test for XSS vulnerability in XSS_level3.php
def test_xss_level3():
    url = "http://localhost/XSS/XSS_level3.php"
    payload = {"username": "<script>alert('XSS')</script>"}
    response = requests.get(url, params=payload)
    assert "<script>alert('XSS')</script>" not in response.text

# Test for XSS vulnerability in XSS_level4.php
def test_xss_level4():
    url = "http://localhost/XSS/XSS_level4.php"
    payload = {"username": "<script>alert('XSS')</script>"}
    response = requests.get(url, params=payload)
    assert "<script>alert('XSS')</script>" not in response.text

# Test for XSS vulnerability in XSS_level5.php
def test_xss_level5():
    url = "http://localhost/XSS/XSS_level5.php"
    payload = {"username": "<script>alert('XSS')</script>"}
    response = requests.get(url, params=payload)
    assert "<script>alert('XSS')</script>" not in response.text
