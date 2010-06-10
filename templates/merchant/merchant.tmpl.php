<?if ($id != 0):?>
      <div class="table_container" style="width: 550px;">
         <div class="table_header">
           <div style="float:right;">
             <a href="index.php?editor=merchant&z=<?=$currzone?>&npcid=<?=$npcid?>&action=8">Temp List</a>&nbsp;
             <a href="index.php?editor=merchant&z=<?=$currzone?>&npcid=<?=$npcid?>&action=19"><img src="images/sort.gif" border=0 title="Sort this merchantlist"></a>&nbsp;
             <a href="index.php?editor=merchant&z=<?=$currzone?>&npcid=<?=$npcid?>&mid=<?=$id?>&action=4"><img src="images/add.gif" border=0 title="Add an Item"></a>&nbsp;
             <a href="index.php?editor=merchant&z=<?=$currzone?>&npcid=<?=$npcid?>&action=1"><img src="images/c_table.gif" border=0 title="Edit this Merchant"></a>&nbsp;
             <a href="index.php?editor=merchant&z=<?=$currzone?>&npcid=<?=$npcid?>&mid=<?=$id?>&action=18" onClick="return confirm('Really Copy Merchant <?=$id?>?');"><img src="images/last.gif" border=0 title="Copy this merchantlist"></a>&nbsp;
             <a href="index.php?editor=merchant&z=<?=$currzone?>&npcid=<?=$npcid?>&mid=<?=$id?>&action=17" onClick="return confirm('Really remove this merchantlist from the selected NPC?');"><img src="images/minus2.gif" border=0 title="Drop this Merchantlist"></a>&nbsp;
             <a href="index.php?editor=merchant&z=<?=$currzone?>&npcid=<?=$npcid?>&mid=<?=$id?>&action=6" onClick="return confirm('Really delete this merchantlist? This will affect all NPCs that share the list!');"><img src="images/table.gif" border=0 title="Delete this Merchantlist"></a>
           </div>
           Merchant ID: <a href="index.php?editor=merchant&z=<?=$currzone?>&npcid=<?=$npcid?>&merid=<?=$id?>&action=16"><?=$id?></a>
         </div>
         <div class="table_content" style="padding: 0px;">
<? if (isset($slots)):?>
        <table width="100%">
          <tr>
            <th align="center">Slot</th>
            <th align="center">Item ID</th>
            <th>Item</th>
            <th>&nbsp;</th>
            <th>Buy for:</th>
            <th>Sell for:</th>
          </tr>
<?$x=0; foreach($slots as $slot=>$v):?>
<?if ($v['price']*0.95 > 999):?>
<?php ($cost = $v['price']*0.95/1000);?>
<?endif;?>
<?if ($v['price']*$v['sellrate']*1.05 > 999):?>
            <?php ($sells = ($v['price']*$v['sellrate']*1.05)/1000);?>
<?endif;?>
<?if ($v['price']*0.95 < 999 && $v['price']*0.95 > 99):?>
<?php ($cost = $v['price']*0.95/100);?>
<?endif;?>
<?if ($v['price']*$v['sellrate']*1.05 < 999 && $v['price']*$v['sellrate']*1.05 > 99):?>
            <?php ($sells = ($v['price']*$v['sellrate']*1.05)/100);?>
<?endif;?>
<?if ($v['price']*0.95 < 99 && $v['price']*0.95 > 9):?>
<?php ($cost = $v['price']*0.95/10);?>
<?endif;?>
<?if ($v['price']*$v['sellrate']*1.05 < 99 && $v['price']*$v['sellrate']*1.05 > 9):?>
            <?php ($sells = ($v['price']*$v['sellrate']*1.05)/10);?>
<?endif;?>
<?if ($v['price']*0.95 < 10):?>
<?php ($cost = $v['price']*0.95);?>
<?endif;?>
<?if ($v['price']*$v['sellrate']*1.05 < 10):?>
            <?php ($sells = ($v['price']*$v['sellrate']*1.05));?>
<?endif;?>
          <tr<? echo ($x % 2 == 1) ? " bgcolor=\"#BBBBBB" : "";?>">
            <td align="center"><?=$slot?></td>
            <td align="center"><a href="index.php?editor=items&z=<?=$currzone?>&npcid=<?=$npcid?>&id=<?=$v['item']?>&action=2"><?=$v['item']?></a></td>
            <td><?=$v['item_name']?></td>
            <td><a href="http://lucy.allakhazam.com/item.html?id=<?=$v['item']?>">Lucy</a></td>
<?if ($v['price'] > 999):?>
            <td><?=$cost?>pp</td>
<?endif;?>
<?if ($v['price'] < 999 && $v['price'] > 99):?>
            <td><?=$cost?>gp</td>
<?endif;?>
<?if ($v['price'] < 99 && $v['price'] > 9):?>
            <td><?=$cost?>sp</td>
<?endif;?>
<?if ($v['price'] < 10):?>
            <td><?=$cost?>cp</td>
<?endif;?>
<?if ($v['price']*$v['sellrate'] > 999):?>
            <td><?=$sells?>pp</td>
<?endif;?>
<?if ($v['price']*$v['sellrate'] < 999 && $v['price']*$v['sellrate'] > 99):?>
            <td><?=$sells?>gp</td>
<?endif;?>
<?if ($v['price']*$v['sellrate'] < 99 && $v['price']*$v['sellrate'] > 9):?>
            <td><?=$sells?>sp</td>
<?endif;?>
<?if ($v['price']*$v['sellrate'] < 10):?>
            <td><?=$sells?>cp</td>
<?endif;?>
            <td align="right" style="padding-right: 10px;">
              <a href="index.php?editor=merchant&z=<?=$currzone?>&npcid=<?=$npcid?>&mid=<?=$id?>&slot=<?=$slot?>&id=<?=$v['item']?>&action=3" onClick="return confirm('Really remove this item from the merchant?');"><img src="images/remove.gif" border="0" title="Delete item from Merchantlist"></a>
            </td>
          </tr>
<?$x++;endforeach;?>
        </table>
<?endif;?>
<? if (!isset($slots)):?>
        No Wares currently assigned
<?endif;?>
         </div>
        </div>
<?endif;?>
<?if ($id == 0):?>
       <table class="edit_form">
         <tr>
           <td class="edit_form_header">Merchant ID: <?=$id?></td>
         </tr>
         <tr>
           <td class="edit_form_content">
             No Merchantlist currently assigned.<br/><br/>
             <center><a href="index.php?editor=npc&z=<?=$currzone?>&npcid=<?=$npcid?>&action=22">Click here to change</a></center>
           </td>
         </tr>
       </table>
<?endif;?>