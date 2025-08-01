#!/usr/bin/expect

spawn ssh jesusmark2@sohwa.org
expect {
    "Are you sure you want to continue connecting" {
        send "yes\r"
        expect "password:"
        send "wotjddl2\r"
    }
    "password:" {
        send "wotjddl2\r"
    }
}
expect "$ "
send "cd /home/hosting_users/jesusmark2/www/sohwa\r"
expect "$ "
send "grep -n 'Google Fonts\\|Font Awesome\\|viewport\\|style_modern' mainhead.sub.php\r"
expect "$ "
send "grep -n 'main-menu-container\\|플래시메뉴' mainhead.php\r"
expect "$ "
send "exit\r"
expect eof