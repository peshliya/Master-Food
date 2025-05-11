<?php
session_start();
if(isset($_SESSION['AdminLoginId']))
{
header("localhost:Admin login.php");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard Design</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://fontawesome.com/icons"/> 
</head>

<body class="a">
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">

            <li class="active">
                <a href="#">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa-solid fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-users"></i>
                    <span>Admin</span>
                </a>
            </li>


            <li>
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span>Setting</span>
                </a>
            </li>

            <li class="logout">
                <a href="#">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <h2>Dashboard</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <i class="fa-solid fa-search"></i>
                    <input type="text" placeholder="Search" />
                </div>
                <i class="fa-solid fa-user-tie icon dark-blue"></i>
            </div>
        </div>

        <div class="card--container">
            <div class="card--wrapper">
                <div class="payment--card light-purple">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">
                                Admin
                            </span>
                            <span class="amount--value">4</span>
                        </div>
                        <i class="fas fa-users icon dark-red"></i>
                    </div>
                    <span class="card-detail">********</span>
                </div>


        <div class="tabular--wrapper">
            <h3 class="main--title">Finance Data</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Transaction Type</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2023-05-01</td>
                            <td>Expenses</td>
                            <td>Office Suppliers</td>
                            <td>$250</td>
                            <td>Office Expenses</td>
                            <td>Pending</td>
                            <td><button>Edit</button></td>
                        </tr>
                        <tr>
                            <td>2023-05-02</td>
                            <td>Income</td>
                            <td>Client Payment</td>
                            <td>$500</td>
                            <td>Sales</td>
                            <td>Completed</td>
                            <td><button>Edit</button></td>
                        </tr>
                        <tr>
                            <td>2023-05-01</td>
                            <td>Expense</td>
                            <td>Travel Expenses</td>
                            <td>$280</td>
                            <td>Travel</td>
                            <td>Pending</td>
                            <td><button>Edit</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>

</html>