#!/usr/bin/expect

set timeout 30

spawn sftp jesusmark2@sohwa.org
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
expect "sftp>"
send "cd /home/hosting_users/jesusmark2/www/sohwa\r"
expect "sftp>"
send "put /Users/mark/sohwa/mainhead.sub.php\r"
expect "sftp>"
send "put /Users/mark/sohwa/mainhead.php\r"
expect "sftp>"
send "ls -la mainhead*\r"
expect "sftp>"
send "exit\r"
expect eof