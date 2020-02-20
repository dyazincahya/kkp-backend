<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>REPORT MAIL</title>

    <style type="text/css">
        body {
            font-family: "Open Sans", sans-serif;
            line-height: 1.25;
        }
        
        table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
            table-layout: fixed;
        }
        
        table caption {
            font-size: 1.5em;
            margin: .5em 0 .75em;
        }
        
        table tr {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: .35em;
        }
        
        table th,
        table td {
            padding: .625em;
            text-align: center;
        }
        
        table th {
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;
        }
        
        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }
            table caption {
                font-size: 1.3em;
            }
            table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }
            table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .625em;
            }
            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .8em;
                text-align: right;
            }
            table td::before {
                /*
		    * aria-label has no advantage, it won't be read inside a table
		    content: attr(aria-label);
		    */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }
            table td:last-child {
                border-bottom: 0;
            }
        }

        footer{
        	text-align: center;
        	font-size: 1em;
        }
        footer > p {
        	padding: 0px;
        	margin: 0px;
        }
        footer > p > b{
        	color: #8eafe2;
        }
        footer > p > i{
        	color: #F2C112;
        }
    </style>
</head>

<body>
    <div align="center">
        <table>
            <caption>CUSTOMER (<?=count($customer);?>)</caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NO KTP</th>
                    <th scope="col">NAMA LENGKAP<br>EMAIL<br>NO TELP</th>
                    <th scope="col">TANGGAL LAHIR</th>
                    <th scope="col">KOTA TINGGAL<br>ALAMAT</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">REG DATE</th>
                </tr>
            </thead>
            <tbody>
            	<?php foreach ($customer as $k => $v) { ?>
	                <tr>
	                    <td><?=($k+1);?></td>
	                    <td><?=$v['customer_no_ktp'];?></td>
	                    <td><?=$v['customer_nama'];?><br><?=$v['customer_email'];?><br><?=$v['customer_no_telp'];?></td>
	                    <td><?=rfdate($v['customer_tgl_lahir'], "d F Y");?></td>	                    
	                    <td><?=$v['customer_kota_tinggal'];?><br>(<?=zempty($v['customer_alamat']);?>)</td>
	                    <td><?=zstatus($v['customer_status']);?></td>
	                    <td><?=rfdate($v['customer_reg_date']);?></td>
	                </tr>
	            <?php } ?>
            </tbody>
        </table>
        <br/>
        <br/>
        <table>
            <caption>PACKAGE (<?=count($package);?>)</caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">CUSTOMER</th>
                    <th scope="col">ISI PAKET</th>
                    <th scope="col">TUJUAN<br>(ALAMAT)</th>
                    <th scope="col">LAST UPDATE</th>
                    <th scope="col">STATUS</th>
                </tr>
            </thead>
            <tbody>
            	<?php foreach ($package as $k => $v) { ?>
	                <tr>
	                    <td><?=($k+1);?></td>
	                    <td><?=$v['customer_nama'];?></td>
	                    <td><?=$v['package_nama'];?></td>
	                    <td><?=$v['package_tujuan'];?><br>(<?=zempty($v['package_alamat']);?>)</td>
	                    <td><?=rfdate($v['package_last_update']);?></td>
	                    <td><?=$v['package_status'];?></td>
	                </tr>
	            <?php } ?>
            </tbody>
        </table>
        <br/>
        <br/>
        <table>
            <caption>SUMMARY</caption>
            <thead>
            	<tr>
                    <th scope="col">Customer Active</th>
                    <th scope="col">Customer Non Active</th>
                    <th scope="col">Customer Pending</th>

                    <th scope="col">Package Request</th>
                    <th scope="col">Package Pickup</th>
                    <th scope="col">Package Karantina</th>
                    <th scope="col">Package Pengiriman</th>
                    <th scope="col">Package Selesai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?=$summary['cust_active'];?></td>
                    <td><?=$summary['cust_nonactive'];?></td>
                    <td><?=$summary['cust_pending'];?></td>

                    <td><?=$summary['pack_request'];?></td>
                    <td><?=$summary['pack_pickup'];?></td>
                    <td><?=$summary['pack_karantina'];?></td>
                    <td><?=$summary['pack_pengiriman'];?></td>
                    <td><?=$summary['pack_selesai'];?></td>
                </tr>
            </tbody>
        </table>
        <br/>
        <br/>
        <br/>
        <footer>
        	<p>---------------</p>
        	<p><b>KIKAN</b></p>
        	<p><i>Kirim Ikan</i></p>
        </footer>
    </div>
</body>

</html>