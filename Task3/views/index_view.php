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
            <input type="button" id="btnAdd" value="ADD" />
            <input type="submit" value="DELETE CHECKED" name="delete" />
        <input type="text" name="searchText" value="<?= $this->searchText ?? '' ?>" />
        <input type="submit" name="search" />
    </div>
</div>

<hr />
    <table>
        <thead>
        <tr>
            <th></th>
            <th><a href="?sort=date">Date</a></th>
            <th><a href="?sort=email">email</a></th>
            <th><?php $length = count($this->Providers);
                foreach($this->Providers as $provider => $provider_value) { ?>
                    <input type="button" onclick="window.location='?provider=<?= $provider  ?>'" value="<?= $provider  ?>" >
                <?php } ?> <input type="button" onclick="window.location='?provider='" value="reset provider" ></th>
        </tr>
        </thead>
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
    <td></td>
</tr>
    <?php
}
//echo $this->Products[$i]->getSku()
?>
        </tbody>
    </table>
<hr />
    <div class="pagination">
        <a href="?pageno=1">First</a>

            <a href="<?php if($this->pageno <= 1){ echo '#'; } else { echo "?pageno=".($this->pageno - 1); } ?>">Prev</a>


            <a href="<?php if($this->pageno >= $this->total_pages){ echo '#'; } else { echo "?pageno=".($this->pageno + 1); } ?>">Next</a>

        <a href="?pageno=<?php echo $this->total_pages; ?>">Last</a>
    </div>
</form>