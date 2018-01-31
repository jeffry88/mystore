

<div class="demo">  
    <div class="showData">  

        <ul class="dates">  
            <?php while ($row = mysqli_fetch_assoc($query)) { ?>   
                <li>
                    <div style="">
                        <img src="img/fiction/<?php echo $row['product_pic'] ?>" >
                        <p>
                            <a target="_blank" href=""><?php echo $row['product_name'] ?></a>
                        </p>
                        <p class="price">¥ <?php echo $row['price']?></p>
                    </div>

                </li>  
            <?php } ?>  
        </ul>  
        <!--显示数据区-->  
    </div>  
    <div class="showPage">  
        <?php
        if ($total > $showrow) {//总记录数大于每页显示数，显示分页  
            $page = new page($total, $showrow, $curpage, $url, 2);
            echo $page->myde_write();
        }
        ?>  
    </div>  
</div>  

