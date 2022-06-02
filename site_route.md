


    Advanced Feature ==> 

        - SMS Messeges.
        - Excel File To products Table
        - Schedule Orders With prescription
        - corona vaccine

    - Users    ==> (  )
    - Categories ==> ( title , img )
    - Caregory_branches ==> ( category_id , title )
    - Products ==>  ( caregory_branch_id , title , price , Quntity , desc )
    - Cart     ==>  ( product_id , user_id )
    - Wishlist ==>  ( product_id , user_id )
    - Messege  ==>  ( full Name , email , Subject , Messege )
    - Prescription  ( img , age , gender , additional_details , medicine , validation , schedule_orders(0,1)  time_schedule )
    - prescription_orders ==> ( user_id , prescription_id ,  address )
    - Orders   ==> ( user_id , array[ product , quntity ] , Total price , address , status )
    - notification ==> user_id , link , content , as_read  ( use at => create_order ,  user_upload_prescriotion , create_prescription_order , messege_sent )
    - Messeges ==> name , email , subject , messege




tasks : 
--------------
- add categories data
- add products data
- dashboard stats
- google sites notification

















problems  :
-----------------------------
- add messeges 
- convert search to 'Get' method
- focus inputs at admin 
- multi select javascript
- select option user by search  
- hidden delete-prescription-btn 
- fixed css footer 
- Organize js files
- edit address & phone array in  admin panal
- fix redirect after error !prescription 
