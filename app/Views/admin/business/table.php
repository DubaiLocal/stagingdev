<?php if (count($bussinesses) != 0) { ?>
    <table class="table table-hover" style='border-collapse: collapse;'>
        <thead>
            <tr>
                <th>Name</th>
                <th>Year_In_Business</th>
                <th>Page_Url</th>
                <th>User_Id</th>
                <th>Category_Name</th>
                <th>More_Category</th>
                <th>More_Subcategory</th>
                <th>Subcategory_Name</th>
                <th>Logo</th>
                <th>Unique_Url</th>
                <th>Address1</th>
                <th>Address2</th>
                <th>City_Id</th>
                <th>State_Id</th>
                <th>Zip</th>
                <th>Country_Id</th>
                <th>Countrys_Id</th>
                <th>Ad2states_Id</th>
                <th>Citys_Id</th>
                <th>Ad2zip</th>
                <th>Suburb</th>
                <th>Terms</th>
                <th>Neighborhoods</th>
                <th>Email</th>
                <th>Phone2</th>
                <th>Opening</th>
                <th>Facebook</th>
                <th>Twitter</th>
                <th>Googleplus</th>
                <th>Linkedin</th>
                <th>bay</th>
                <th>amazon</th>
                <th>youtube</th>
                <th>vote_count</th>
                <th>category_rank</th>
                <th>order_id</th>
                <th>phone</th>
                <th>url</th>
                <th>lat</th>
                <th>lng</th>
                <th>award</th>
                <th>award_year</th>
                <th>status</th>
                <th>created</th>
                <th>modified</th>
                <th>coming_year_award</th>
                <th>added_type</th>
                <th>top5</th>
                <th>meta_keyword</th>
                <th>meta_title</th>
                <th>meta_description</th>
                <th>comment</th>
                <th>award_winner_comments</th>
                <th>tag</th>
                <th>totalreviews</th>
                <th>cid_url</th>
                <th>google_search</th>
                <th>numberofview</th>
                <th>premium_status</th>
                <th>coming_year_top5</th>
                <th>current_vote_count</th>
                <th>more_images</th>
                <th>email_address</th>
                <th>total_vote</th>
                <th>general_info</th>
                <th>extra_info</th>
                <th>scrap_images</th>
                <th>description</th>
                <!--  <th>Operations</th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bussinesses as $bussiness) { ?>
                <tr>
                    <td><?php echo $bussiness['name']; ?></td>

                    <td><?php echo $bussiness['year_in_business']; ?></td>
                    <td><?php echo $bussiness['page_url']; ?></td>
                    <td><?php echo $bussiness['user_id']; ?></td>
                    <td><?php echo $bussiness['cat_name']; ?></td>
                    <td><?php echo $bussiness['more_category']; ?></td>
                    <td><?php echo $bussiness['more_subcategory']; ?></td>
                    <td><?php echo $bussiness['sub_cat_name']; ?></td>
                    <td><?php echo $bussiness['logo']; ?></td>
                    <td><?php echo $bussiness['unique_url']; ?></td>
                    <td><?php echo $bussiness['address1']; ?></td>
                    <td><?php echo $bussiness['address2']; ?></td>
                    <td><?php echo $bussiness['city_id']; ?></td>
                    <td><?php echo $bussiness['state_id']; ?></td>
                    <td><?php echo $bussiness['zip']; ?></td>
                    <td><?php echo $bussiness['country_id']; ?></td>
                    <td><?php echo $bussiness['countrys_id']; ?></td>
                    <td><?php echo $bussiness['ad2states_id']; ?></td>
                    <td><?php echo $bussiness['citys_id']; ?></td>
                    <td><?php echo $bussiness['ad2zip']; ?></td>
                    <td><?php echo $bussiness['suburb']; ?></td>
                    <td><?php echo $bussiness['terms']; ?></td>
                    <td><?php echo $bussiness['neighborhoods']; ?></td>
                    <td><?php echo $bussiness['email']; ?></td>
                    <td><?php echo $bussiness['phone2']; ?></td>
                    <td><?php echo $bussiness['opening']; ?></td>
                    <td><?php echo $bussiness['facebook']; ?></td>
                    <td><?php echo $bussiness['twitter']; ?></td>
                    <td><?php echo $bussiness['googleplus']; ?></td>
                    <td><?php echo $bussiness['linkedin']; ?></td>
                    <td><?php echo $bussiness['ebay']; ?></td>
                    <td><?php echo $bussiness['amazon']; ?></td>
                    <td><?php echo $bussiness['youtube']; ?></td>
                    <td><?php echo $bussiness['vote_count']; ?></td>
                    <td><?php echo $bussiness['category_rank']; ?></td>
                    <td><?php echo $bussiness['order_id']; ?></td>
                    <td><?php echo $bussiness['phone']; ?></td>
                    <td><?php echo $bussiness['url']; ?></td>
                    <td><?php echo $bussiness['lat']; ?></td>
                    <td><?php echo $bussiness['lng']; ?></td>
                    <td><?php echo $bussiness['award']; ?></td>
                    <td><?php echo $bussiness['award_year']; ?></td>
                    <td><?php echo $bussiness['status']; ?></td>
                    <td><?php echo $bussiness['created']; ?></td>
                    <td><?php echo $bussiness['modified']; ?></td>
                    <td><?php echo $bussiness['coming_year_award']; ?></td>
                    <td><?php echo $bussiness['added_type']; ?></td>
                    <td><?php echo $bussiness['top5']; ?></td>
                    <td><?php echo $bussiness['meta_keyword']; ?></td>
                    <td><?php echo $bussiness['meta_title']; ?></td>
                    <td><?php echo $bussiness['meta_description']; ?></td>
                    <td><?php echo $bussiness['comment']; ?></td>
                    <td><?php echo $bussiness['award_winner_comments']; ?></td>
                    <td><?php echo $bussiness['tag']; ?></td>
                    <td><?php echo $bussiness['totalreviews']; ?></td>
                    <td><?php echo $bussiness['cid_url']; ?></td>
                    <td><?php echo $bussiness['google_search']; ?></td>
                    <td><?php echo $bussiness['numberofview']; ?></td>
                    <td><?php echo $bussiness['premium_status']; ?></td>
                    <td><?php echo $bussiness['coming_year_top5']; ?></td>
                    <td><?php echo $bussiness['current_vote_count']; ?></td>
                    <td><?php echo $bussiness['more_images']; ?></td>
                    <td><?php echo $bussiness['email_address']; ?></td>
                    <td><?php echo $bussiness['total_vote']; ?></td>
                    <td><?php echo $bussiness['general_info']; ?></td>
                    <td><?php echo $bussiness['extra_info']; ?></td>
                    <td><?php echo $bussiness['scrap_images']; ?></td>
                    <td class="des_width"><?php echo $bussiness['description']; ?></td>
                </tr>
            <?php } ?>
            <?php
            if (count($bussinesses) == 0) {
                echo "<tr>";
                echo "<td colspan='3'>No record found.</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <div style='margin-top: 10px;'>
        <?= $pager->links() ?>
    </div>
<?php } else { ?>
    <div class="">
        <p>No records found</p>
    </div>
<?php } ?>