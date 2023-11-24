<?php
namespace src;

class Config {
    const BASE_PORT = 2000;
    const BASE_DIR = '';

    const DB_DRIVER = 'mysql';
    const DB_HOST = 'clinica-mysql';
    const DB_DATABASE = 'clinica';
    CONST DB_USER = 'root';
    const DB_PASS = 'clinica_2018';

    const BASE_API = 'http://clinica.admin.com.br:2001';

    const ERROR_CONTROLLER = 'ErrorController';
    const DEFAULT_ACTION = 'index';
}