<?php
/*
Plugin Name: URL Parameter Display
Description: URLパラメータ{city}を取得してショートコードで表示するプラグイン
Version: 1.3
Author: Gayo
*/

if (!class_exists('URLParameterDisplay')) {
    class URLParameterDisplay {

        private $parameter = 'city';

        private $shortcode_name = 'display_city';

        public function __construct() {
            add_action('init', array($this, 'register_shortcodes'));
        }

        // ショートコードを登録
        public function register_shortcodes() {
            if (!shortcode_exists($this->$shortcode_name)) {
                add_shortcode($this->$shortcode_name, array($this, 'display_shortcode'));
            }
        }

        // ショートコードのコールバック関数
        public function display_shortcode() {
            $city = $this->get_url_parameter($this->parameter);
            if ($city) {
                $decoded = $this->decode_parameter($city);
                $sanitized = $this->sanitize_parameter($decoded);
                if ($this->is_valid_japanese($sanitized)) {
                    return $this->escape_output($sanitized);
                } else {
                    return 'パラメーター不明';
                }
            } else {
                return 'パラメーター無し';
            }
        }

        // URLパラメータを取得
        private function get_url_parameter($param) {
            return isset($_GET[$param]) ? $_GET[$param] : false;
        }

        // パラメータをデコード
        private function decode_parameter($param) {
            return urldecode($param);
        }

        // パラメータをサニタイズ
        private function sanitize_parameter($param) {
            return sanitize_text_field($param);
        }

        // 出力をエスケープ
        private function escape_output($output) {
            return esc_html($output);
        }

        // 日本語のバリデーション
        private function is_valid_japanese($string) {
            // マルチバイトの正規表現を使用して日本語かどうかをチェック
            return preg_match('/^[ぁ-んァ-ヶ一-龠々ー]+$/u', $string);
        }
    }

    // プラグインのインスタンスを作成
    $urlParameterDisplay = new URLParameterDisplay();
}