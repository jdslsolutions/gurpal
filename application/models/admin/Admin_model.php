<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
   
   
   function get_banners()
   {
	   
	   
   }
   
   /* 
   #######################################
   ADMIN STATE MODULE
   #######################################
   */
   function get_states()
   {
	   $states=$this->db->get_where('tbl_states',array('is_deleted'=>0));
	   if($states)
	   {
		  return $states->result_array(); 
	   }
	   
	   return null;
	   
   }
   
   function add_state($data=null)
   {
	   if($data)
	   {
		   $this->db->insert('tbl_states',array('state_name'=>$data['state_name'],'active'=>$data['active'],'fk_country_id'=>$data['fk_country_id'],'meta_title'=>$data['meta_title'],'meta_description'=>$data['meta_description'],'meta_keywords'=>$data['meta_keywords']));
		   $id=$this->db->insert_id();
		   if($id)
		   {
				return array('status'=>true);
		   }
		   
		   return array('status'=>false);
	   }
	   
   }
   
   function edit_state($data=null)
   {
	   if($data)
	   {
		   $this->db->where(array('pk_state_id'=>$data['pk_state_id']));
		   $id=$this->db->update('tbl_states',array('state_name'=>$data['state_name'],'active'=>$data['active'],'fk_country_id'=>$data['fk_country_id'],'meta_title'=>$data['meta_title'],'meta_description'=>$data['meta_description'],'meta_keywords'=>$data['meta_keywords']));
		   
		   if($id)
		   {
				return array('status'=>true);
		   }
		   
		   return array('status'=>false);
	   }
	   
   }
   
   function remove_state($id)
   {
	   if($id)
	   {
		   $this->db->where(array('pk_state_id'=>$id));
		   $rid=$this->db->update('tbl_states',array('is_deleted'=>1));
		   
		   if($rid)
		   {
				return array('status'=>true);
		   }
		   
		   return array('status'=>false);
	   }
	   
   }
   
   
   function check_state_id($id=null)
   {
	   if($id)
	   {
		  $return=$this->db->get_where('tbl_states',array('pk_state_id'=>$id,'is_deleted'=>0)); 
		  if($return)
		  {
			$return=$return->row_array();
			if($return['pk_state_id'])
			{
				
				return $return;
			}
		  }
		   
	   }
	   
	   return false;
   }
   
   /* 
   #######################################
   ADMIN CITY MODULE 
   #######################################
   */
  
   function get_cities()
   {
	  
	   $this->db->select('c.*,s.state_name');
	   $this->db->from('tbl_cities as c');
	   $this->db->join('tbl_states as s','c.fk_state_id=s.pk_state_id','inner');
	   $this->db->where(array('c.is_deleted'=>0));
	   $cities=$this->db->get();
	   if($cities)
	   {
		  return $cities->result_array(); 
	   }
	   
	   return null;
	   
   }
   
   function add_city($data=null)
   {
	   if($data)
	   {
		   $this->db->insert('tbl_cities',array('city_name'=>$data['city_name'],'active'=>$data['active'],'fk_state_id'=>$data['fk_state_id'],'meta_title'=>$data['meta_title'],'meta_description'=>$data['meta_description'],'meta_keywords'=>$data['meta_keywords']));
		   $id=$this->db->insert_id();
		   if($id)
		   {
				return array('status'=>true);
		   }
		   
		   return array('status'=>false);
	   }
	   
   }
   
   function edit_city($data=null)
   {
	   if($data)
	   {
		   $this->db->where(array('pk_city_id'=>$data['pk_city_id']));
		   $id=$this->db->update('tbl_cities',array('city_name'=>$data['city_name'],'active'=>$data['active'],'fk_state_id'=>$data['fk_state_id'],'meta_title'=>$data['meta_title'],'meta_description'=>$data['meta_description'],'meta_keywords'=>$data['meta_keywords']));
		   
		   if($id)
		   {
				return array('status'=>true);
		   }
		   
		   return array('status'=>false);
	   }
	   
   }
   
   function remove_city($id)
   {
	   if($id)
	   {
		   $this->db->where(array('pk_city_id'=>$id));
		   $rid=$this->db->update('tbl_cities',array('is_deleted'=>1));
		   
		   if($rid)
		   {
				return array('status'=>true);
		   }
		   
		   return array('status'=>false);
	   }
	   
   }
   
   
   function check_city_id($id=null)
   {
	   if($id)
	   {
		  $return=$this->db->get_where('tbl_cities',array('pk_city_id'=>$id,'is_deleted'=>0)); 
		  if($return)
		  {
			$return=$return->row_array();
			if($return['pk_city_id'])
			{
				
				return $return;
			}
		  }
		   
	   }
	   
	   return false;
   }
   
    /* 
   #######################################
   ADMIN Brands MODULE 
   #######################################
   */
  
   function get_brands()
   {
	  
	   $brands=$this->db->get_where('tbl_brands',array('active'=>'1'));
	   if($brands)
	   {
		  return $brands->result_array(); 
	   }
	   
	   return null;
	   
   }
   
   function add_brand($data=null)
   {
	   if($data)
	   {
		   
		   $this->db->insert('tbl_brands',array('brand_name'=>$data['brand_name'],'brand_image'=>$data['brand_image'],'active'=>$data['active'],'created_by'=>$data['created_by']));
		   $id=$this->db->insert_id();
		   if($id)
		   {
				return array('status'=>true);
		   }
		   
		   return array('status'=>false);
	   }
	   
   }
   
   function edit_brand($data=null)
   {
	   if($data)
	   {
		   $this->db->where(array('pk_brand_id'=>$data['pk_brand_id']));
		   $insert_arr=array('city_name'=>$data['city_name'],'active'=>$data['active']);
		   if(isset($data['brand_image']) && !empty($data['brand_image']))
		   {
			 $insert_arr['brand_image']=  $data['brand_image'];
		   }
		   $id=$this->db->update('tbl_brands',$insert_arr);
		   
		   if($id)
		   {
				return array('status'=>true);
		   }
		   
		   return array('status'=>false);
	   }
	   
   }
   
   function remove_brand($id)
   {
	   if($id)
	   {
		   $this->db->where(array('pk_brands_id'=>$id));
		   $rid=$this->db->delete('tbl_brands');
		   
		   if($rid)
		   {
				return array('status'=>true);
		   }
		   
		   return array('status'=>false);
	   }
	   
   }
   
   
   function check_brand_id($id=null)
   {
	   if($id)
	   {
		  $return=$this->db->get_where('tbl_brands',array('pk_brand_id'=>$id)); 
		  if($return)
		  {
			$return=$return->row_array();
			if($return['pk_brand_id'])
			{
				
				return $return;
			}
		  }
		   
	   }
	   
	   return false;
   }
   
    /* 
   #######################################
   ADMIN GST MODULE 
   #######################################
   */
   
    function get_gst()
   {
	   $gst=$this->db->get_where('tbl_gst',array('active'=>1));
	   if($gst)
	   {
		  return $gst->result_array(); 
	   }
	   
	   return null;
	   
   }

   function add_gst($data=null)
   {
	   if($data)
	   {
		   $this->db->insert('tbl_gst',array('gst_slab'=>$data['gst_slab'],'gst_value'=>$data['gst_value'],'active'=>$data['active']));
		   $id=$this->db->insert_id();
		   if($id)
		   {
				return array('status'=>true);
		   }
		   
		   return array('status'=>false);
	   }
	   
   }
   
   function edit_gst($data=null)
   {
	   if($data)
	   {
		   $this->db->where(array('pk_gst_id'=>$data['pk_gst_id']));
		   $id=$this->db->update('tbl_gst',array('gst_slab'=>$data['gst_slab'],'gst_value'=>$data['gst_value'],'active'=>$data['active']));
		   
		   if($id)
		   {
				return array('status'=>true);
		   }
		   
		   return array('status'=>false);
	   }
	   
   }
   
   function remove_gst($id)
   {
	   if($id)
	   {
		   $this->db->where(array('pk_gst_id'=>$id));
		   $rid=$this->db->update('tbl_gst',array('active'=>0));
		   
		   if($id)
		   {
				return array('status'=>true);
		   }
		   
		   return array('status'=>false);
	   }
	   
   }
   
   
   function check_gst_id($id=null)
   {
	   if($id)
	   {
		  $return=$this->db->get_where('tbl_gst',array('pk_gst_id'=>$id,'active'=>1)); 
		  if($return)
		  {
			$return=$return->row_array();
			if($return['pk_gst_id'])
			{
				
				return $return;
			}
		  }
		   
	   }
	   
	   return false;
   }
   
   
   
   
   
       /* 
   #######################################
   ADMIN PRODUCTS MODULE 
   #######################################
   */
  
  
   
    private function _get_products_query()
    {
        $this->db->select('p.*,pp.*,pc.category_name,b.brand_name,a.admin_name');
        $this->db->from('tbl_products as p');
		$this->db->join('tbl_product_pricing as pp','p.pk_product_id=pp.fk_product_id','left');
		$this->db->join('tbl_product_category as pc','p.product_category=pc.pk_category_id','left');
		$this->db->join('tbl_brands as b','p.product_brand=b.pk_brand_id','left');
		$this->db->join('tbl_admin as a','p.fk_admin_id=a.pk_admin_id','left');
		if($this->session->user_type=='admin')
		{
			$this->db->where(array('p.active'=>1,'p.is_deleted'=>0,'p.fk_admin_id'=>$this->session->pk_admin_id));
		}
		$colums=array('p.product_name','pc.category_name');
        
        $i = 0;
        foreach ($colums as $item) // loop column
        {
            if(@$_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, @$_POST['search']['value']);
                }
                if(count($this->column) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }
      
    }

    function get_products()
    {
        $this->_get_products_query();
        if($this->input->post('length') != -1)
        $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
    }

    function products_count_filtered()
    {
        $this->_get_products_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

     function products_count_all()
    {
        $this->db->from('tbl_products');
        return $this->db->count_all_results();
    }
	
	
	function get_cross_products()
	{
		
		if($this->session->user_type=='admin')
		{
		$this->db->select('p.product_name,pp.product_image,pp.sdiscount_price,pp.original_price');
        $this->db->from('tbl_products as p');
		$this->db->join('tbl_product_pricing as pp','p.pk_product_id=pp.fk_product_id','inner');
		$this->db->where(array('pp.is_default'=>1,'p.active'=>1,'is_deleted'=>0,'p.fk_admin_id'=>$this->session->pk_admin_id));
		$results=$this->db->get();
		if($results)
		{
			return $results->result_array();
		}
			
		}
		 return false;
	}
	
	
	function get_admins()
	{
		$this->db->select('admin_name');
		$this->db->from('tbl_admin');
		$this->db->where(array('active'=>1,'is_super'=>0));
		$results=$this->db->get();	
		if($results)
		{
			return $results->row_array();
		}
		return false;
	}
	
	function get_product_cats()
	{
		$results=$this->db->get_where('tbl_product_category',array('active'=>1,'is_deleted'=>0));
		if($results)
		{
			return $results->result_array();
		}
		return false;
	}
   
    function add_product($data=null)
   {
	   if($data)
	   {  
		   $this->db->insert('tbl_products',$data);
		   $id=$this->db->insert_id();
		   if($id)
		   {
				return array('status'=>true);
		   }
		   
		   return array('status'=>false);
	   }
	   
   }
   
     function check_product_id($id=null)
   {
	   if($id)
	   {
		  $return=$this->db->get_where('tbl_products',array('pk_product_id'=>$id)); 
		  if($return)
		  {
			$return=$return->row_array();
			if($return['pk_product_id'])
			{
				
				return $return;
			}
		  }
		   
	   }
	   
	   return false;
   }
   
    function edit_product($data=null,$id=null)
   {
	   if($data && $id)
	   {
		   $this->db->where(array('pk_product_id'=>$id));
		   
		   $id=$this->db->update('tbl_products',$data);
		   
		   if($id)
		   {
				return array('status'=>true);
		   }
		   
		   return array('status'=>false);
	   }
	   
   }
   
  function remove_product($id)
   {
	   if($id)
	   {
		   $this->db->where(array('pk_products_id'=>$id));
		   $rid=$this->db->delete('tbl_products');
		   
		   if($rid)
		   {
				return array('status'=>true);
		   }
		   
		   return array('status'=>false);
	   }
	   
   }
 
  
}
