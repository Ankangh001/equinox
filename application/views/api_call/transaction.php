<?php

// curl_close($curl);

$url = 'https://api.blockcypher.com/v1/btc/main/addrs/bc1qk8u9u92e7t0qp3nggg05rdr3ed9fqk2uqv4rwn/full';
$curl = curl_init();
$apiKey ="42ffd41960db43c08d34277de19d0df5";

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            'Authorization: '.$apiKey,
            "cache-control: no-cache"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        $response = json_decode($response, true);
        
        echo "<pre>";
        print_r($response);
        // exit;

if ($response) { ?>


    <table>
        <tbody>
            <tr>
                <td>Address</td>
                <td id="text-long"><?= @$response['address'] ?><i id="copy" style="margin-left: 1.2rem;" class="fas fa-clone"></i></td>
            </tr>
            <tr>
                <td>Transactions</td>
                <td><?= @$response['n_tx'] ?></td>
            </tr>
            <tr>
                <td>Total Received</td>
                <td><?= @$response['total_received'] / 100000000 ?></td>
            </tr>
            <tr>
                <td>Total Sent</td>
                <td><?= @$response['total_sent'] / 100000000 ?></td>
            </tr>
            <tr>
                <td>Final Balance</td>
                <td><?= @$response['final_balance'] / 100000000 ?></td>
            </tr>
        </tbody>
    </table>
    <h3 class="custom-pad" style="font-size: 1.4rem; color: #797979; padding-top: 2.2rem;">TRANSACTIONS</h3>
    <?php foreach (array_slice($response['txs'], 0, 10) as $txn) : ?>
        <table class="custom-pad">
            <tbody>
                <tr>
                    <td>Hash</td>
                    <td id="text-long"><?= $txn['hash'] ?> <i id="copy" style="margin-left: 1.2rem;" class="fas fa-clone"></i></td>
                </tr>
                <tr>
                    <td>Fees</td>
                    <td><?=$txn['fees'] ?></td>
                </tr>
                <tr>
                    <td>Confirmed Date</td>
                    <td><?= substr($txn['confirmed'],0,10)  ?></td>
                </tr>
                <tr>
                    <td>Confirmed Time</td>
                    <td><?= substr($txn['confirmed'],11)  ?></td>
                </tr>
                <tr>
                    <td>Received Date</td>
                    <td><?= substr($txn['received'],0,10)  ?></td>
                </tr>
                <tr>
                    <td>Received Time</td>
                    <td><?= substr($txn['received'],11,18)  ?></td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td><?= $txn['size'] ?></td>
                </tr>
                <tr>
                    <td>Weight</td>
                    <td><?= $txn['weight'] ?></td>
                </tr>
                <tr>
                    <td>Included in Block</td>
                    <td><?= @$txn['block_height'] ?></td>
                </tr>

            </tbody>

        </table>
<?php
    endforeach;
}
// }
?>
</div>
<footer>
<p style="text-align: center;">All the data have been taken from @blockchain.com</p>
</footer>