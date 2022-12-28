<?php if(isset($_GET['picked_date'])): ?>
    <?php $dt = new DateTimeImmutable( $_GET['picked_date'] ); ?>
    <input
        type="text"
        name="date"
        class="p-1"
        id="dateinput"
        readonly
        required="required"
        value="<?php echo $dt->format('Y-m-d') ?>"
        hx-swap-oob="true">
    <?php exit; ?>
<?php endif; ?>

<?php
$date = new DateTimeImmutable( $_GET['date'] ?? 'now' );
$days_in_month = $date->format('t');
$prev_month = $date->setDate( $date->format('Y'), $date->format('m'), 1 )->modify('-1 months');
$next_month = $date->setDate( $date->format('Y'), $date->format('m'), 1 )->modify('+1 months');
?>
<div class="grid grid-cols-3 gap-2 py-2">
    <button
        type="button"
        class="bg-slate-400 text-black p-1"
        hx-get="/datepicker.php?date=<?php echo $prev_month->format('Y-m-1') ?>"
        hx-target="#datepicker-widget"
        >
        &lt; prev
    </button>
    <div class="text-center py-2 font-semibold"><?php echo $date->format('M, Y') ?></div>
    <button
        type="button"
        class="bg-slate-400 text-black p-1"
        hx-get="/datepicker.php?date=<?php echo $next_month->format('Y-m-1') ?>"
        hx-target="#datepicker-widget"
        >
        next &gt;
    </button>
</div>
<div class="grid grid-cols-7 gap-2">
<?php for($i = 1; $i <= $days_in_month; $i++): ?>
    <?php $dt = $date->setDate( $date->format('Y'), $date->format('m'), $i ) ?>
    <button
        type="button"
        class="bg-slate-300 text-black p-1"
        hx-get="/datepicker.php?picked_date=<?php echo $dt->format('Y-m-d') ?>"
        hx-target="#datepicker-widget"
        >
        <?php echo $i ?>
    </button>
<?php endfor; ?>
</div>