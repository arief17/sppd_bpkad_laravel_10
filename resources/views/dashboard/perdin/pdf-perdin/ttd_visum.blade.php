<html>
<head>
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box
		}

		.gap-t td {
			padding: 1px;
		}

		p, td {
			font-size: 14px;
			vertical-align: top;
		}
	</style>
</head>
<body style="font-family: Times, serif; margin: 20px;">
	<table class="gap-t" style="width: 100%; border-collapse: collapse;">
		<tr>
			<td style="width: 1%; vertical-align: top; padding-top: 3px;">&nbsp;&nbsp;&nbsp;</td>
			<td style="border-right: 0; width: 49%;"></td>
			<td style="width: 50%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="vertical-align: top; width: 1%;">&nbsp;</td>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">&nbsp;</td>
						<td style="white-space: nowrap;">&nbsp;</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3"></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td></td>
						<td colspan="2">
							<p style="font-weight: bold; margin-top: 60px;">&nbsp;</p>
							<p>&nbsp;</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td style="width: 1%; vertical-align: top; padding-top: 3px;">&nbsp;&nbsp;&nbsp;</td>
			<td style="border-right: 0; width: 49%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="vertical-align: top; width: 1%;"></td>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">
							<p>{{ $jabatan }}</p>
							<p style="padding-top: 50px;">
								<p style="text-decoration: underline; font-weight: bold;">{{ $nama }}</p>
								<p>NIP.{{ $nip }}</p>
							</p>
						</td>
					</tr>
				</table>
			</td>
			<td style="width: 50%;">
				<table style="width: 100%;">
					<tr>
						<td rowspan="5" style="vertical-align: top; width: 1%; padding: 5px;"></td>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td style="white-space: nowrap; width: 1%; padding-right: 10px;">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">
							<p>{{ $jabatan }}</p>
							<p style="padding-top: 50px;">
								<p style="text-decoration: underline; font-weight: bold;">{{ $nama }}</p>
								<p>NIP.{{ $nip }}</p>
							</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>
