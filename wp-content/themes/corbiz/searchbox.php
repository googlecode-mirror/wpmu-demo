          <!-- search-->
          <div class="searchbox">
            <form  method="get" id="search" action="<?php echo home_url(); ?>/">
              <div>
                <input type="text" class="searchtext" value="<?php echo __('Search...','corbiz');?>" onblur="if (this.value == ''){this.value = '<?php echo __('Search...','corbiz');?>'; }" onfocus="if (this.value == '<?php echo __('Search...','corbiz');?>') {this.value = ''; }"   name="s" id="s"/>
                <input type="submit" class="searchbutton" value="" />
              </div>      						                	
            </form>
          </div>