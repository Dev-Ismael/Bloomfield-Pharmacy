


    Advanced Feature ==> 

        - SMS Messeges.
        - Excel File To products Table
        - Schedule Orders With prescription



    - Users    ==> (  )
    - Categories ==> ( title , img )
    - Caregory_branches ==> ( category_id , title )
    - Products ==>  ( caregory_branch_id , title , price , Quntity )
    - Cart     ==>  ( product_id , user_id )
    - Wishlist ==>  ( product_id , user_id )
    - Messege  ==>  ( full Name , email , Subject , Messege )
    - Prescription  ( img , age , gender , additional_details , medicine , validation , schedule_orders(0,1)  time_schedule )
    - prescription_orders ( prescription_id , address , status )
    - Orders   ==> ( type{prescription/products}  , json_array[ product , quntity , price ] , Total price , address , status )