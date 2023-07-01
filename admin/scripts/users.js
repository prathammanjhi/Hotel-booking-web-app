        
        
        function get_users() {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/users.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {

                console.log(this.responseText);
                document.getElementById('users-data').innerHTML = this.responseText;
            }

            xhr.send('get_users');
        }
        
        function toggle_status(id, val) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/users.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (this.responseText == 1) {
                    alert('success', 'status toggled!');
                    get_users();
                    // console.log(this.responseText);
                } else {
                    alert('error', 'server down!');
                }
            }

            xhr.send('toggle_status=' + id + '&value=' + val);
        }

        function remove_user(user_id) {

            if (confirm("Are You Sure, you want to remove this user?")) {

                let data = new FormData();
                data.append('user_id', user_id);
                data.append('remove_user', '');

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/users.php", true);

                xhr.onload = function() {
                    // console.log(this.responseText);

                    if (this.responseText == 1) {

                        alert('success', 'user removed!');
                        get_users();

                    } else {

                        alert('error', 'failed to remove user!');

                    }

                }

                xhr.send(data);

            }
        }

        function search_user(username){
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/users.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {

                console.log(this.responseText);
                document.getElementById('users-data').innerHTML = this.responseText;
            }

            xhr.send('search_users&name='+username);
        }


        window.onload = function() {
            get_users();
        }
