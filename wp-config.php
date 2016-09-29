<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意: 
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'SRM_COM');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'root');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'root');

/** MySQL のホスト名 */
define('DB_HOST', 'localhost');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8mb4');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ')x^fp57)W,>@,:/|N<^E(1H@Y_xkp_^nm0k=/{jb?w!w.F&[F]BHHg7dvejR?7{S');
define('SECURE_AUTH_KEY',  'u@-W!$C^x4,(tp}:niStcpF_U?.Ql!@Zq&X[T},Bp& 87}YWkqFdOi 58s9.<d:!');
define('LOGGED_IN_KEY',    '9L[Fy*k)J%f*1R#Fle[*|f8!C4K`p)@U=<p?xs3/y64gA-90N3lM;kCf1$V8NJ5$');
define('NONCE_KEY',        'z_as.hw>*q/$Jgw7Axah]E []{e~3];;.!-11PXC},A&f0qQcf;#6e$s~]!t;!B$');
define('AUTH_SALT',        'Rv.24bs~A/eG80}egG3[~/:pV}KP*H3,Gz(>yn!b+JU(@sd4oX&ji[g1$?I+M4ma');
define('SECURE_AUTH_SALT', 'g4 j&m$BI5~K(~Mgc%>Nguh~~Bi4!+@9i#!U}kMD^:I>:29%%Z6.T~7j;y0$HQVf');
define('LOGGED_IN_SALT',   'A5H;69FPod/a>TpIWCA<=L`95U1;CA|j/|9Y)rnctwW;GP:^yUNOe.^?ioGr:3OR');
define('NONCE_SALT',       ',nRQg^Z!FFspL[+<Vnnc?O?~6>WH7yNG-o.VM{^AomUQ,Tx7wCGXDZ55DLJMV:w%');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
