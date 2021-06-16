<script type="text/javascript">
    $(document).ready(function(){
    $("#btnAdd").click(function(){
        window.location = 'subscribe.php';
    })
    });
</script>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Product List</h1>
        </div>
        <div class="col col-lg-1 align-self-center">
            <input type="button" id="btnAdd" value="ADD" />
        </div>
        <div class="col col-lg-1 align-self-center">
            <input type="submit" value="DELETE CHECKED" name="delete" />
        </div>
    </div>
</div>

<hr />
    <table>
        <tbody>
<?php
$length = count($this->Subscriptions);
for ($i = 0; $i < $length; $i++) { ?>
<tr>
            <td><input type="checkbox" class = "delete-checkbox" name="<?php echo $this->Subscriptions[$i]->getId(); ?>" />
            </td>
            <td><?php echo $this->Subscriptions[$i]->getDate()->format('d-m-Y H:i:s'); ?>
            </td>
            <td><?php echo $this->Subscriptions[$i]->getEmail(); ?>
            </td>
</tr>
    <?php
}
//echo $this->Products[$i]->getSku()
?>
        </tbody>
    </table>
<hr />
</form>