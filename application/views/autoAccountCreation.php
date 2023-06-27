<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Auto meta account creation</h1>


    <script src="<?= base_url('assets/mt5.js')?>"></script>
    <script>
        const token = 'eyJhbGciOiJSUzUxMiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI0ZDJkNzkwNTNjMzM4Y2FiZmE3NzhmODYyNGZkMmViZiIsInBlcm1pc3Npb25zIjpbXSwiYWNjZXNzUnVsZXMiOlt7ImlkIjoidHJhZGluZy1hY2NvdW50LW1hbmFnZW1lbnQtYXBpIiwibWV0aG9kcyI6WyJ0cmFkaW5nLWFjY291bnQtbWFuYWdlbWVudC1hcGk6cmVzdDpwdWJsaWM6KjoqIl0sInJvbGVzIjpbInJlYWRlciIsIndyaXRlciJdLCJyZXNvdXJjZXMiOlsiKjokVVNFUl9JRCQ6KiJdfSx7ImlkIjoibWV0YWFwaS1yZXN0LWFwaSIsIm1ldGhvZHMiOlsibWV0YWFwaS1hcGk6cmVzdDpwdWJsaWM6KjoqIl0sInJvbGVzIjpbInJlYWRlciIsIndyaXRlciJdLCJyZXNvdXJjZXMiOlsiKjokVVNFUl9JRCQ6KiJdfSx7ImlkIjoibWV0YWFwaS1ycGMtYXBpIiwibWV0aG9kcyI6WyJtZXRhYXBpLWFwaTp3czpwdWJsaWM6KjoqIl0sInJvbGVzIjpbInJlYWRlciIsIndyaXRlciJdLCJyZXNvdXJjZXMiOlsiKjokVVNFUl9JRCQ6KiJdfSx7ImlkIjoibWV0YWFwaS1yZWFsLXRpbWUtc3RyZWFtaW5nLWFwaSIsIm1ldGhvZHMiOlsibWV0YWFwaS1hcGk6d3M6cHVibGljOio6KiJdLCJyb2xlcyI6WyJyZWFkZXIiLCJ3cml0ZXIiXSwicmVzb3VyY2VzIjpbIio6JFVTRVJfSUQkOioiXX0seyJpZCI6Im1ldGFzdGF0cy1hcGkiLCJtZXRob2RzIjpbIm1ldGFzdGF0cy1hcGk6cmVzdDpwdWJsaWM6KjoqIl0sInJvbGVzIjpbInJlYWRlciJdLCJyZXNvdXJjZXMiOlsiKjokVVNFUl9JRCQ6KiJdfSx7ImlkIjoicmlzay1tYW5hZ2VtZW50LWFwaSIsIm1ldGhvZHMiOlsicmlzay1tYW5hZ2VtZW50LWFwaTpyZXN0OnB1YmxpYzoqOioiXSwicm9sZXMiOlsicmVhZGVyIiwid3JpdGVyIl0sInJlc291cmNlcyI6WyIqOiRVU0VSX0lEJDoqIl19LHsiaWQiOiJjb3B5ZmFjdG9yeS1hcGkiLCJtZXRob2RzIjpbImNvcHlmYWN0b3J5LWFwaTpyZXN0OnB1YmxpYzoqOioiXSwicm9sZXMiOlsicmVhZGVyIiwid3JpdGVyIl0sInJlc291cmNlcyI6WyIqOiRVU0VSX0lEJDoqIl19LHsiaWQiOiJtdC1tYW5hZ2VyLWFwaSIsIm1ldGhvZHMiOlsibXQtbWFuYWdlci1hcGk6cmVzdDpkZWFsaW5nOio6KiIsIm10LW1hbmFnZXItYXBpOnJlc3Q6cHVibGljOio6KiJdLCJyb2xlcyI6WyJyZWFkZXIiLCJ3cml0ZXIiXSwicmVzb3VyY2VzIjpbIio6JFVTRVJfSUQkOioiXX1dLCJ0b2tlbklkIjoiMjAyMTAyMTMiLCJpbXBlcnNvbmF0ZWQiOmZhbHNlLCJyZWFsVXNlcklkIjoiNGQyZDc5MDUzYzMzOGNhYmZhNzc4Zjg2MjRmZDJlYmYiLCJpYXQiOjE2ODc4OTIwMjJ9.QpnjDj6EPd5e03iCHM5kPagBAXdfwQux_VlBImP6fur3SsAlhaBYfW9wb40_ofny3iShwpeaBRKiTliP0FHnPAQYGoO_orKjb7WOKV_AljrE7cW3y05UFrdTKqTUe4JkZG-nbzQ82fzRMdW_2PTN-j8IL5pPh6GAhY50GeLy_Nsxu4YvAAxU-VB2L00sUF7zw50Z_BsuR595P9ua-o4OeteMSa1ZbIo_3i_JIY6WLg_60QsLsTjKW_Dcj4zkuNYUNhc00h6IQlR-FJfku25o8N1BK4ZtHAS48ZLM0xmkM_LY8x_yzWpXL-N32EUO5j4PcvEVovF-DQHx0s3Zx49egK7OqYKCZR70n8f94QKfxO5rqIp4MVOfIUuF3jyoiFvzc_QQWoJLeeWLYb2vX4R8_V-0oDmPu0-sX5iKmGNvn1K9LSEwrzi12-kUEHNF6vtCnVPWF9y7SqNyjVIz8aOIoPJH8l6CPV4wvtvKadH8b4sl4NoEzzkfiuVdGE6Jw0UPJvYMy2vJr17qMhDq2W59PkGCXSgR5nv1rnttviMYo2nTquKs1BbQNVSacYRswtUgx0SaJJnWLnDykRtrsrtRZ7ZBuabelqx1b4pbHH9Ssa8Z1SBBIs3h0XpF3DT5WqFSipfwL19LwJoeCWL0l3W_EKmr5sn7xDnW4Qu7ZcdKS8Y';
        const api = new MetaApi(token);
        // console.clear();
        console.log(api.metatraderAccountApi);

        async function myDisplay() {
            // let accountId = '850843';
            // let account = await api.metatraderAccountApi.getAccount(accountId);
            // let accountAccessToken = account.accessToken;

            // create the account without login and password specified
            const account = await api.metatraderAccountApi.createAccount({
            name: 'Trading account #1',
            type: 'cloud',
            server: 'ICMarketsSC-Demo',
            provisioningProfileId: provisioningProfile.id,
            application: 'MetaApi',
            magic: 123456,
            quoteStreamingIntervalInSeconds: 2.5, // set to 0 to receive quote per tick
            reliability: 'high' // set this field to 'high' value if you want to increase uptime of your account (recommended for production environments)
            });
            let configurationLink = account.createConfigurationLink();


            console.log(accountAccessToken);
        };

        myDisplay();
    </script>
</body>
</html>