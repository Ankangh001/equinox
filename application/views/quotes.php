<?php
$this->load->view('includes/header');
?>
<style>
    .iframe{
        width: fit-content;
        margin:auto
    }

    .tradingview-widget-container{
        width: 100% !important;
    }
    .nav-link {
        width: 25%;
    }
    .nav-tabs button {
        color: #ffffff;
        font-size: 16px;
    }

    .bg-box {
        background: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.03);
        box-shadow: 0 0 8px #00000070;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
    }

    table.account-config td {
        padding: 12px 0 !important;
        position: relative;
        color: #000000;
        border-bottom: 1px solid #ddd;
        border-top: 1px solid #ddd;
    }
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color: #fff!important;
        background-color: #0077ee !important;
        border-color: #0077ee #0077ee #0077ee #0077ee !important;
        border-bottom: 4px solid #0077ee;
        margin-bottom: -4px;
    }
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active span {
        color: #fff!important;
        font-weight: 600;
    }
    .nav-tabs {
        /* border-bottom: 1px solid #dee2e6; */
        margin: auto;
        width: 100%;
        text-align: center;
        border-bottom: 4px solid #00000040;
        justify-content: space-evenly;
    }
    .nav-link span{
        font-size:18px;
    }
    body{
        background: linear-gradient(180deg, #ffffff 20%, #eee 100%)  !important;
    }
    @media (max-width: 992px){
        .nav-tabs .nav-link{
            width: 50% !important;
        }
        iframe{
            width: 100% !important;
        }   
        .nav-tabs {
            border-bottom: none !important;
            flex-direction: row !important;
            width: 100%;
        }
    }
</style>
<main id="main">
<section id="navtabs-count" style="margin:6rem auto 0 auto; background:#ffffff !important; ">

    <div class="container" data-aos="fade-up">
            <div class="section-title text-center">
                <h2>Market Watch</h2>
            </div>
        <div class="row">
          <div class="col-lg-12 order-2 order-lg-1 iframe" data-aos="zoom-in" data-aos-delay="100">
			<nav class="quotes-nav">
				<div class="nav nav-tabs" id="nav-tab" role="tablist">
					<button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
						<span>Forex</span>
					</button>
					<button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
						<span>Indices</span>
					</button>
					<button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
						<span>Crypto</span>
					</button>
					<button class="nav-link" id="nav-4-tab" data-bs-toggle="tab" data-bs-target="#nav-4" type="button" role="tab" aria-controls="nav-4" aria-selected="false">
						<span>Commodities</span>
					</button>
				</div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
                <!-- Forex -->
				<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                        <div class="tradingview-widget-copyright">
                            <a href="https://in.tradingview.com/markets/currencies/" rel="noopener" target="_blank">
                                <span class="blue-text"></span>
                            </a>
                        </div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
                            {
                            "title": "Currencies",
                            "title_link": "/markets/currencies/rates-major/",
                            "width": 770,
                            "height": 450,
                            "locale": "in",
                            "showSymbolLogo": true,
                            "symbolsGroups": [
                                {
                                "name": "Major",
                                "symbols": [
                                    {
                                    "name": "FX_IDC:EURUSD",
                                    "displayName": "EUR/USD"
                                    },
                                    {
                                    "name": "FX_IDC:USDJPY",
                                    "displayName": "USD/JPY"
                                    },
                                    {
                                    "name": "FX_IDC:GBPUSD",
                                    "displayName": "GBP/USD"
                                    },
                                    {
                                    "name": "FX_IDC:AUDUSD",
                                    "displayName": "AUD/USD"
                                    },
                                    {
                                    "name": "FX_IDC:USDCAD",
                                    "displayName": "USD/CAD"
                                    },
                                    {
                                    "name": "FX_IDC:USDCHF",
                                    "displayName": "USD/CHF"
                                    }
                                ]
                                },
                                {
                                "name": "Minor",
                                "symbols": [
                                    {
                                    "name": "FX_IDC:EURGBP",
                                    "displayName": "EUR/GBP"
                                    },
                                    {
                                    "name": "FX_IDC:EURJPY",
                                    "displayName": "EUR/JPY"
                                    },
                                    {
                                    "name": "FX_IDC:GBPJPY",
                                    "displayName": "GBP/JPY"
                                    },
                                    {
                                    "name": "FX_IDC:CADJPY",
                                    "displayName": "CAD/JPY"
                                    },
                                    {
                                    "name": "FX_IDC:GBPCAD",
                                    "displayName": "GBP/CAD"
                                    },
                                    {
                                    "name": "FX_IDC:EURCAD",
                                    "displayName": "EUR/CAD"
                                    }
                                ]
                                },
                                {
                                "name": "Exotic",
                                "symbols": [
                                    {
                                    "name": "FX_IDC:USDSEK",
                                    "displayName": "USD/SEK"
                                    },
                                    {
                                    "name": "FX_IDC:USDMXN",
                                    "displayName": "USD/MXN"
                                    },
                                    {
                                    "name": "FX_IDC:USDZAR",
                                    "displayName": "USD/ZAR"
                                    },
                                    {
                                    "name": "FX_IDC:EURTRY",
                                    "displayName": "EUR/TRY"
                                    },
                                    {
                                    "name": "FX_IDC:EURNOK",
                                    "displayName": "EUR/NOK"
                                    },
                                    {
                                    "name": "FX_IDC:GBPPLN",
                                    "displayName": "GBP/PLN"
                                    }
                                ]
                                }
                            ],
                            "colorTheme": "light"
                            }
                        </script>
                    </div>
				</div>
                <!-- indices -->
				<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/markets/indices/" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
                            {
                            "title": "Indices",
                            "width": 770,
                            "height": 450,
                            "locale": "in",
                            "showSymbolLogo": true,
                            "symbolsGroups": [
                            {
                                "name": "US & Canada",
                                "symbols": [
                                {
                                    "name": "FOREXCOM:SPXUSD",
                                    "displayName": "S&P 500"
                                },
                                {
                                    "name": "FOREXCOM:NSXUSD",
                                    "displayName": "US 100"
                                },
                                {
                                    "name": "CME_MINI:ES1!",
                                    "displayName": "S&P 500"
                                },
                                {
                                    "name": "INDEX:DXY",
                                    "displayName": "U.S. Dollar Currency Index"
                                },
                                {
                                    "name": "FOREXCOM:DJI",
                                    "displayName": "Dow 30"
                                }
                                ]
                            },
                            {
                                "name": "Europe",
                                "symbols": [
                                {
                                    "name": "INDEX:SX5E",
                                    "displayName": "Euro Stoxx 50"
                                },
                                {
                                    "name": "FOREXCOM:UKXGBP",
                                    "displayName": "UK 100"
                                },
                                {
                                    "name": "INDEX:DEU40",
                                    "displayName": "DAX Index"
                                },
                                {
                                    "name": "INDEX:CAC40",
                                    "displayName": "CAC 40 Index"
                                },
                                {
                                    "name": "INDEX:SMI",
                                    "displayName": "SWISS MARKET INDEX SMI® PRICE"
                                }
                                ]
                            },
                            {
                                "name": "Asia/Pacific",
                                "symbols": [
                                {
                                    "name": "INDEX:NKY",
                                    "displayName": "Nikkei 225"
                                },
                                {
                                    "name": "INDEX:HSI",
                                    "displayName": "Hang Seng"
                                },
                                {
                                    "name": "BSE:SENSEX",
                                    "displayName": "BSE SENSEX"
                                },
                                {
                                    "name": "BSE:BSE500",
                                    "displayName": "S&P BSE 500 INDEX"
                                },
                                {
                                    "name": "INDEX:KSIC",
                                    "displayName": "Kospi Composite"
                                }
                                ]
                            }
                            ],
                            "colorTheme": "light"
                            }
                        </script>
                    </div>
				</div>
                <!-- Crypto -->
				<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/markets/cryptocurrencies/" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
                    {
                    "title": "Cryptocurrencies",
                    "title_raw": "Cryptocurrencies",
                    "title_link": "/markets/cryptocurrencies/prices-all/",
                    "width": 770,
                    "height": 450,
                    "locale": "in",
                    "showSymbolLogo": true,
                    "symbolsGroups": [
                        {
                        "name": "Overview",
                        "symbols": [
                            {
                            "name": "CRYPTOCAP:TOTAL"
                            },
                            {
                            "name": "BITSTAMP:BTCUSD"
                            },
                            {
                            "name": "BITSTAMP:ETHUSD"
                            },
                            {
                            "name": "FTX:SOLUSD"
                            },
                            {
                            "name": "BINANCE:AVAXUSD"
                            },
                            {
                            "name": "COINBASE:UNIUSD"
                            }
                        ]
                        },
                        {
                        "name": "Bitcoin",
                        "symbols": [
                            {
                            "name": "BITSTAMP:BTCUSD"
                            },
                            {
                            "name": "COINBASE:BTCEUR"
                            },
                            {
                            "name": "COINBASE:BTCGBP"
                            },
                            {
                            "name": "BITFLYER:BTCJPY"
                            },
                            {
                            "name": "CME:BTC1!"
                            }
                        ]
                        },
                        {
                        "name": "Ethereum",
                        "symbols": [
                            {
                            "name": "BITSTAMP:ETHUSD"
                            },
                            {
                            "name": "KRAKEN:ETHEUR"
                            },
                            {
                            "name": "COINBASE:ETHGBP"
                            },
                            {
                            "name": "BITFLYER:ETHJPY"
                            },
                            {
                            "name": "BINANCE:ETHBTC"
                            },
                            {
                            "name": "BINANCE:ETHUSDT"
                            }
                        ]
                        },
                        {
                        "name": "Solana",
                        "symbols": [
                            {
                            "name": "FTX:SOLUSD"
                            },
                            {
                            "name": "BINANCE:SOLEUR"
                            },
                            {
                            "name": "COINBASE:SOLGBP"
                            },
                            {
                            "name": "BINANCE:SOLBTC"
                            },
                            {
                            "name": "HUOBI:SOLETH"
                            },
                            {
                            "name": "BINANCE:SOLUSDT"
                            }
                        ]
                        },
                        {
                        "name": "Uniswap",
                        "symbols": [
                            {
                            "name": "COINBASE:UNIUSD"
                            },
                            {
                            "name": "KRAKEN:UNIEUR"
                            },
                            {
                            "name": "COINBASE:UNIGBP"
                            },
                            {
                            "name": "BINANCE:UNIBTC"
                            },
                            {
                            "name": "KRAKEN:UNIETH"
                            },
                            {
                            "name": "BINANCE:UNIUSDT"
                            }
                        ]
                        }
                    ],
                    "colorTheme": "light"
                    }
                    </script>
                    </div>
                    <!-- TradingView Widget END -->
				</div>
                <!-- Comodities -->
				<div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-4-tab">
                    <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
                {
                "width": 770,
                "height": 450,
                "symbolsGroups": [
                    {
                    "name": "Commodities ",
                    "symbols": [
                        {
                        "name": "OANDA:XAUUSD",
                        "displayName": "XAU/USD"
                        },
                        {
                        "name": "OANDA:XAGUSD",
                        "displayName": "XAG/USD"
                        },
                        {
                        "name": "OANDA:XPTUSD",
                        "displayName": "XPT/USD"
                        },
                        {
                        "name": "OANDA:XAUEUR",
                        "displayName": "XAU/EUR"
                        },
                        {
                        "name": "OANDA:XAGEUR",
                        "displayName": "XAG/EUR"
                        },
                        {
                        "name": "FX_IDC:XPTEUR",
                        "displayName": "XPT/EUR"
                        },
                        {
                        "name": "TVC:USOIL",
                        "displayName": "US OIL"
                        },
                        {
                        "name": "TVC:UKOIL",
                        "displayName": "UK OIL"
                        }
                    ]
                    }
                ],
                "showSymbolLogo": true,
                "colorTheme": "light",
                "isTransparent": false,
                "locale": "in"
                }
                </script>
                </div>
                <!-- TradingView Widget END -->
			</div>
        </div>
    </div>
    </div>
</section><!-- End About Section -->


</main>
<?php
$this->load->view('includes/footer');
?>