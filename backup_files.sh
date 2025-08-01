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
send "cp mainhead.php mainhead.php.backup\r"
expect "$ "
send "cp mainhead.sub.php mainhead.sub.php.backup\r"
expect "$ "
send "ls -la mainhead*.backup\r"
expect "$ "
send "exit\r"
expect eof