<!DOCTYPE HTML>
<html> 
<head>
<style>
table 
	{
		font-family: arial, sans-serif;
		border-collapse: collapse: 
		width: 100%;
	}
td 
	{
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
	}
tr:nth-child(even)
	{
		background-color: #dddddd;
	}
</style>
</head>
<?php
//Hard coded variables
$EmployeeName = "Kevin Slonka";
$HoursWorked = 40.0;
$PayRate = 54.50;
$GrossPay = $HoursWorked * $PayRate;
$FedTaxWR = 0.245;
$StateTaxWR = 0.055;
$FedTax = $GrossPay * $FedTaxWR;
$StateTax = $GrossPay * $StateTaxWR;
$Deduction = $FedTax + $StateTax;
$NetPay = $GrossPay - $Deduction;
$YearIncome = $GrossPay *52;

if ($YearIncome <= 11600)
	$TaxBracket = "10%";
elseif($YearIncome >= 11601 && $YearIncome <= 47150)
	$TaxBracket = "12%";
elseif($YearIncome >= 47151 && $YearIncome <= 100525)
	$TaxBracket = "22%";
elseif($YearIncome >= 100526 && $YearIncome <= 191950)
	$TaxBracket = "24%";
elseif($YearIncome >= 191951 && $YearIncome <= 243725)
	$TaxBracket =  "32%";
elseif($YearIncome >= 243726 && $YearIncome <= 609350)
	$TaxBracket = "35%";
elseif($YearIncome >= 609351)
	$TaxBracket = "37%";
?>
	<body> 
		<h2> PHP Pay Calculator </h2>
		<table>
			<tr> 
				<td>Employee Name: <?php echo $EmployeeName ?> </td>
			</tr>
			<tr>
				<td>Hours Worked: <?php echo $HoursWorked ?> </td>
			</tr>
			<tr>
				<td>Pay Rate: <?php printf("$%.2f",$PayRate); ?> </td>
			</tr>
			<tr>
				<td>Gross Pay: <?php printf("$%.2f",$HoursWorked * $PayRate); ?> </td>
			</tr>
			<tr>
				<td>Deductions</td>
			</tr>
			<tr>
				<td>Federal Withholding (24.5%): <?php printf("$%.2f",$GrossPay * $FedTaxWR); ?> </td>
			</tr>
			<tr>
				<td>State Withholding (5.5%): <?php printf("$%.2f",$GrossPay * $StateTaxWR); ?> </td>
			</tr>
			<tr>
				<td>Total Deduction: <?php printf("$%.2f", $Deduction); ?> </td>
			</tr>
			<tr>	
				<td>Net Pay: <?php printf("$%.2f", $NetPay); ?> </td>
			</tr>
			<tr>
				<td>Year Income: <?php printf("$%.2f", $YearIncome); ?> </td> 
			</tr>
			<tr>
			<td>Tax Bracket: <?php echo $TaxBracket ?> </td>
			</tr>
		</table>
	</body>			
</html> 


