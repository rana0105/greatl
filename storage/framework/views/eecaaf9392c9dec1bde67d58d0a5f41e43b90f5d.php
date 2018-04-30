

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tansaction History</title>
  <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        width: auto;
        font-size: 12px;
        border: 1px solid #000000;
        /*border: none;*/
        text-align: center;
        padding-top: 4px;
        padding-bottom:  5px;
        margin-top: 2px;
        margin-bottom: 2px;
    }
    input {
        border: none;
    }

    textarea {
        border: none;
  }
  </style>
</head>
<body>
  <h2 style="text-align: center;">Tansaction History</h2>
  <table style="float: center;">
    <thead>
      <tr>
        <th>Date</th>
        <th>Discription</th>
        <th>Invoice</th>
        <th>Amount</th>
        <th>Balance</th>
      </tr>
    </thead>
    <tbody>
    <?php if(sizeof($paymentHistory)>0): ?>
    <?php $__currentLoopData = $paymentHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e(date('d-M-Y', strtotime($history->created_at))); ?></td>
        <td><?php echo e($history->project->p_title); ?></td>
        <td></td>
        <td>$<?php echo e($history->freelancer_payment); ?> (USD)</td>
        <td>$<?php echo e($history->freelancer_payment); ?> (USD)</td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
      <tr>
        <td colspan="5">No data found yet !</td>
      </tr>
    <?php endif; ?>
    </tbody>
  </table>
</body>
</html>