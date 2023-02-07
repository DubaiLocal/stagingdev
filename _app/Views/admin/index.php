
      <?php echo view('admin/template/header'); ?>
      <?php $session = session(); ?>
      
                  <div class="main-body">
                     <div class="page-wrapper">
                        <div class="row">
                           <div class="col-md-12">
                              <a class="btn btn_custom" href='<?= site_url('exportData') ?>'>Export</a><br><br>
                              <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
                                 <thead class="thead-dark">
                                    <tr>
                                       <th>Name</th>
                                       <th>Year_In_Business</th>
                                       <th>Page_Url</th>
                                       <th>User_Id</th>
                                       <th>Category_Id</th>
                                       <th>More_Category</th>
                                       <th>More_Subcategory</th>
                                       <th>Subcategory_Id</th>
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
                                       <th>Operations</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                       foreach($users as $user){ ?>
                                    <tr>
                                       <td><?php echo $business['Name']; ?></td>
                                       
                                       <td><?php echo $user['year_in_business']; ?></td>
                                       <td><?php echo $user['page_url']; ?></td>
                                       <td><?php echo $user['user_id']; ?></td>
                                       <td><?php echo $user['category_id']; ?></td>
                                       <td><?php echo $user['more_category']; ?></td>
                                       <td><?php echo $user['more_subcategory']; ?></td>
                                       <td><?php echo $user['subcategory_id']; ?></td>
                                       <td><?php echo $user['logo']; ?></td>
                                       <td><?php echo $user['unique_url']; ?></td>
                                       <td><?php echo $user['address1']; ?></td>
                                       <td><?php echo $user['address2']; ?></td>
                                       <td><?php echo $user['city_id']; ?></td>
                                       <td><?php echo $user['state_id']; ?></td>
                                       <td><?php echo $user['zip']; ?></td>
                                       <td><?php echo $user['country_id']; ?></td>
                                       <td><?php echo $user['countrys_id']; ?></td>
                                       <td><?php echo $user['ad2states_id']; ?></td>
                                       <td><?php echo $user['citys_id']; ?></td>
                                       <td><?php echo $user['ad2zip']; ?></td>
                                       <td><?php echo $user['suburb']; ?></td>
                                       <td><?php echo $user['terms']; ?></td>
                                       <td><?php echo $user['neighborhoods']; ?></td>
                                       <td><?php echo $user['email']; ?></td>
                                       <td><?php echo $user['phone2']; ?></td>
                                       <td><?php echo $user['opening']; ?></td>
                                       <td><?php echo $user['facebook']; ?></td>
                                       <td><?php echo $user['twitter']; ?></td>
                                       <td><?php echo $user['googleplus']; ?></td>
                                       <td><?php echo $user['linkedin']; ?></td>
                                       <td><?php echo $user['ebay']; ?></td>
                                       <td><?php echo $user['amazon']; ?></td>
                                       <td><?php echo $user['youtube']; ?></td>
                                       <td><?php echo $user['vote_count']; ?></td>
                                       <td><?php echo $user['category_rank']; ?></td>
                                       <td><?php echo $user['order_id']; ?></td>
                                       <td><?php echo $user['phone']; ?></td>
                                       <td><?php echo $user['url']; ?></td>
                                       <td><?php echo $user['lat']; ?></td>
                                       <td><?php echo $user['lng']; ?></td>
                                       <td><?php echo $user['award']; ?></td>
                                       <td><?php echo $user['award_year']; ?></td>
                                       <td><?php echo $user['status']; ?></td>
                                       <td><?php echo $user['created']; ?></td>
                                       <td><?php echo $user['modified']; ?></td>
                                       <td><?php echo $user['coming_year_award']; ?></td>
                                       <td><?php echo $user['added_type']; ?></td>
                                       <td><?php echo $user['top5']; ?></td>
                                       <td><?php echo $user['meta_keyword']; ?></td>
                                       <td><?php echo $user['meta_title']; ?></td>
                                       <td><?php echo $user['meta_description']; ?></td>
                                       <td><?php echo $user['comment']; ?></td>
                                       <td><?php echo $user['award_winner_comments']; ?></td>
                                       <td><?php echo $user['tag']; ?></td>
                                       <td><?php echo $user['totalreviews']; ?></td>
                                       <td><?php echo $user['cid_url']; ?></td>
                                       <td><?php echo $user['google_search']; ?></td>
                                       <td><?php echo $user['numberofview']; ?></td>
                                       <td><?php echo $user['premium_status']; ?></td>
                                       <td><?php echo $user['coming_year_top5']; ?></td>
                                       <td><?php echo $user['current_vote_count']; ?></td>
                                       <td><?php echo $user['more_images']; ?></td>
                                       <td><?php echo $user['email_address']; ?></td>
                                       <td><?php echo $user['total_vote']; ?></td>
                                       <td><?php echo $user['general_info']; ?></td>
                                       <td><?php echo $user['extra_info']; ?></td>
                                       <td><?php echo $user['scrap_images']; ?></td>
                                       <td class="des_width"><?php echo $user['description']; ?></td>
                                       <td><a href='updatebussiness.php?id=$row[id]'>Edit</a></td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <!-- Paginate --> 
                        <div style='margin-top: 10px;'> 
                           <?= $pager->links() ?>
                        </div>
                     </div>
                  </div>
   
      <?php echo view('admin/template/footer'); ?>
