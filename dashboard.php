<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/dashboard3.css" rel="stylesheet" type="text/css">
    <title>Dashboard</title>
</head>
<body>
    

    <nav>
        <div class="container">
            <img src="images/intrinsic2.jpg" class="logo" alt="">
            <div class="search-bar">
                <span class="fas fa-search"></span>
                <input type="search" placeholder="Search">
            </div>
            <div class="profile-area">
                <div class="theme-btn">
                    <span class="fas fa-moon active"></span>
                    <span class="fas fa-sun"></span>
                </div>
                <div class="profile">
                    <div class="profile-photo">
                        <img src="images/teacher-1.png" alt="">
                    </div>
                    <h5>Chu hua</h5>
                    <span class="fas fa-angle-down"></span>
                </div>
                <button id="menu-btn">
                    <span class="fas fa-bars"></span>
                </button>
            </div>
        </div>
    </nav>

    <main>
        <aside>
            <button id="close-btn">
                <span class="fas fa-times"></span>
            </button>

            <div class="sidebar">
                <a href="#" class="active">
                    <span class="fas fa-chart-line"></span>
                    <h4>Dashboard</h4>
                </a>
                <a href="#">
                    <span class="fas fa-chart-line"></span>
                    <h4>Dashboard</h4>
                </a>
                <a href="#">
                    <span class="fas fa-chart-line"></span>
                    <h4>Dashboard</h4>
                </a>
                <a href="#">
                    <span class="fas fa-chart-line"></span>
                    <h4>Dashboard</h4>
                </a>
                <a href="#">
                    <span class="fas fa-chart-line"></span>
                    <h4>Dashboard</h4>
                </a>
                <a href="#">
                    <span class="fas fa-chart-line"></span>
                    <h4>Dashboard</h4>
                </a>
                <a href="#">
                    <span class="fas fa-chart-line"></span>
                    <h4>Dashboard</h4>
                </a>
                <a href="#">
                    <span class="fas fa-chart-line"></span>
                    <h4>Dashboard</h4>
                </a>
            </div>
            <div class="updates">
                <span class="fas fa-chart-line"></span>
                <h4>Updates Available</h4>
                <small>Security Updates</small>
                <small>General Updates</small>
                <a href="#">Update Now</a>
            </div>
        </aside>

        <section class="middle">
            <div class="header">
                <h1>Overview</h1>
                <input type="date">
            </div>

            <div class="cards">
                <div class="card">
                    <div class="top">
                        <div class="left">
                            <img src="images/subject-icon-6.png" alt="">
                            <h2>BTC</h2>
                        </div>
                        <img src="images/subject-icon-5.png" alt="" class="right">
                    </div>
                    <div class="middle">
                         <h1>$827,1116</h1>
                         <img src="images/subject-icon-4.png" alt="" class="chip">
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <small>Card Holder</small>
                            <h5>John Doe</h5>
                        </div>
                        <div class="right">
                            <div class="expiry">
                                <small>Expiry</small>
                                <h5>08 / 23 </h5>
                            </div>
                            <div class="cvv">
                                <small>CVV</small>
                                <h5>123 </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="top">
                        <div class="left">
                            <img src="images/subject-icon-6.png" alt="">
                            <h2>BTC</h2>
                        </div>
                        <img src="images/subject-icon-5.png" alt="" class="right">
                    </div>
                    <div class="middle">
                         <h1>$827,1116</h1>
                         <img src="images/subject-icon-4.png" alt="" class="chip">
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <small>Card Holder</small>
                            <h5>John Doe</h5>
                        </div>
                        <div class="right">
                            <div class="expiry">
                                <small>Expiry</small>
                                <h5>08 / 23 </h5>
                            </div>
                            <div class="cvv">
                                <small>CVV</small>
                                <h5>123 </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="top">
                        <div class="left">
                            <img src="images/subject-icon-6.png" alt="">
                            <h2>BTC</h2>
                        </div>
                        <img src="images/subject-icon-5.png" alt="" class="right">
                    </div>
                    <div class="middle">
                         <h1>$827,1116</h1>
                         <img src="images/subject-icon-4.png" alt="" class="chip">
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <small>Card Holder</small>
                            <h5>John Doe</h5>
                        </div>
                        <div class="right">
                            <div class="expiry">
                                <small>Expiry</small>
                                <h5>08 / 23 </h5>
                            </div>
                            <div class="cvv">
                                <small>CVV</small>
                                <h5>123 </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="monthly-report">
                <div class="report">
                    <h3>Income</h3>
                    <div>
                        <details>
                            <h1>$29,000</h1>
                            <h6 class="success">+3.5%</h6>
                        </details>
                        <p class="text-muted">Compared to $26,000 last month</p>
                    </div>
                </div>

                <div class="report">
                    <h3>Income</h3>
                    <div>
                        <details>
                            <h1>$29,000</h1>
                            <h6 class="danger">-3.5%</h6>
                        </details>
                        <p class="text-muted">Compared to $26,000 last month</p>
                    </div>
                </div>

                <div class="report">
                    <h3>Income</h3>
                    <div>
                        <details>
                            <h1>$29,000</h1>
                            <h6 class="success">+3.5%</h6>
                        </details>
                        <p class="text-muted">Compared to $26,000 last month</p>
                    </div>
                </div>

                <div class="report">
                    <h3>Income</h3>
                    <div>
                        <details>
                            <h1>$29,000</h1>
                            <h6 class="danger">-3.5%</h6>
                        </details>
                        <p class="text-muted">Compared to $26,000 last month</p>
                    </div>
                </div>
            </div>

            <div class="fast-payment">
                <h2>Fast Payment</h2>
                <div class="badges">
                    <div class="badge">
                        <span class="fas fa-plus"></span>
                    </div>
                    <div class="badge">
                        <span class="bg-primary"></span>
                        <div>
                            <h5>Training</h5>
                            <h4>$50</h4>
                        </div>
                    </div>

                    <div class="badge">
                        <span class="bg-primary"></span>
                        <div>
                            <h5>Training</h5>
                            <h4>$50</h4>
                        </div>
                    </div>

                    <div class="badge">
                        <span class="bg-primary"></span>
                        <div>
                            <h5>Training</h5>
                            <h4>$50</h4>
                        </div>
                    </div>

                    <div class="badge">
                        <span class="bg-primary"></span>
                        <div>
                            <h5>Training</h5>
                            <h4>$50</h4>
                        </div>
                    </div>

                    <div class="badge">
                        <span class="bg-primary"></span>
                        <div>
                            <h5>Training</h5>
                            <h4>$50</h4>
                        </div>
                    </div>

                    <div class="badge">
                        <span class="bg-primary"></span>
                        <div>
                            <h5>Training</h5>
                            <h4>$50</h4>
                        </div>
                    </div>
                    
                    <div class="badge">
                        <span class="bg-primary"></span>
                        <div>
                            <h5>Training</h5>
                            <h4>$50</h4>
                        </div>
                    </div>
                </div>
            </div>

            <canvas id="chart">

            </canvas>
        </section>

        <section class="right">
            <div class="investments">
                <div class="header">
                    <h2>Investments</h2>
                    <a href="#">More <i class="fas fa angle-right"></i> </a>
                </div>
                <div class="investment">
                    <img src="images/subject-icon-1.png" alt="">
                    <h4>Unilever</h4>
                    <div class="date-time">
                        <p>07 Nov, 2021</p>
                        <small class="text-muted">9:14pm</small>
                    </div>
                    <div class="bonds">
                        <p>1402</p>
                        <small class="text-muted">Bonds</small>
                    </div>
                    <div class="amount">
                        <h4>$20,033</h4>
                        <small class="danger">-4.27%</small>
                    </div>
                </div>
                <div class="investment">
                    <img src="images/subject-icon-1.png" alt="">
                    <h4>Unilever</h4>
                    <div class="date-time">
                        <p>07 Nov, 2021</p>
                        <small class="text-muted">9:14pm</small>
                    </div>
                    <div class="bonds">
                        <p>1402</p>
                        <small class="text-muted">Bonds</small>
                    </div>
                    <div class="amount">
                        <h4>$20,033</h4>
                        <small class="success">+4.27%</small>
                    </div>
                </div>
                <div class="investment">
                    <img src="images/subject-icon-1.png" alt="">
                    <h4>Unilever</h4>
                    <div class="date-time">
                        <p>07 Nov, 2021</p>
                        <small class="text-muted">9:14pm</small>
                    </div>
                    <div class="bonds">
                        <p>1402</p>
                        <small class="text-muted">Bonds</small>
                    </div>
                    <div class="amount">
                        <h4>$20,033</h4>
                        <small class="danger">-4.27%</small>
                    </div>
                </div>
                <div class="investment">
                    <img src="images/subject-icon-1.png" alt="">
                    <h4>Unilever</h4>
                    <div class="date-time">
                        <p>07 Nov, 2021</p>
                        <small class="text-muted">9:14pm</small>
                    </div>
                    <div class="bonds">
                        <p>1402</p>
                        <small class="text-muted">Bonds</small>
                    </div>
                    <div class="amount">
                        <h4>$20,033</h4>
                        <small class="success">+4.27%</small>
                    </div>
                </div>
            </div>

            <div class="recent-transactions">
                <div class="header">
                    <h2>Recent Transactions</h2>
                    <a href="#">More <span class="fas fa-angle-right"></span> </a>
                </div>

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-purple-light"> 
                            <span class="fas fa-plus purple"></span>
                        </div>
                        <div class="details">
                            <h4>Music</h4>
                            <p>20.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-danger">
                            <img src="images/subject-icon-1.png" alt="">
                        </div>
                        <div class="details">
                            <p>*2757</p>
                            <small class="text-muted">Credit Card</small>
                        </div>
                    </div>
                    <h4>$20</h4>
                </div>

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-purple-light"> 
                            <span class="fas fa-plus purple"></span>
                        </div>
                        <div class="details">
                            <h4>Music</h4>
                            <p>20.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-danger">
                            <img src="images/subject-icon-2.png" alt="">
                        </div>
                        <div class="details">
                            <p>*2757</p>
                            <small class="text-muted">Credit Card</small>
                        </div>
                    </div>
                    <h4>$20</h4>
                </div>

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-purple-light"> 
                            <span class="fas fa-plus purple"></span>
                        </div>
                        <div class="details">
                            <h4>Music</h4>
                            <p>20.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-danger">
                            <img src="images/subject-icon-3.png" alt="">
                        </div>
                        <div class="details">
                            <p>*2757</p>
                            <small class="text-muted">Credit Card</small>
                        </div>
                    </div>
                    <h4>$20</h4>
                </div>

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-purple-light"> 
                            <span class="fas fa-plus purple"></span>
                        </div>
                        <div class="details">
                            <h4>Music</h4>
                            <p>20.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-danger">
                            <img src="images/subject-icon-4.png" alt="">
                        </div>
                        <div class="details">
                            <p>*2757</p>
                            <small class="text-muted">Credit Card</small>
                        </div>
                    </div>
                    <h4>$20</h4>
                </div>

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-purple-light"> 
                            <span class="fas fa-plus purple"></span>
                        </div>
                        <div class="details">
                            <h4>Music</h4>
                            <p>20.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-danger">
                            <img src="images/subject-icon-5.png" alt="">
                        </div>
                        <div class="details">
                            <p>*2757</p>
                            <small class="text-muted">Credit Card</small>
                        </div>
                    </div>
                    <h4>$20</h4>
                </div>
            </div>
        </section>
    </main>

    <script src="js/dashboard.js"></script>
</body>
</html>