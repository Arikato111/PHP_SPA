
# PHP_SPA
# this is starter template
# is work on single page and try to use function for page 

 - when use if you need to create new file in page folder don't forgot  
   to use import on package.php, should not use require or include for  
   folder* , and set path in path.php with Route() and use inside [] of
              SwitchPath
 
 - Route() need path and callback function to return page function

- don't let Page function be emty or null

- getParams() will get the last params

- if use MySQL Database , Must use $GLOBALS['conn'] instead of $conn

 - if want to change title, use title() 

- dont keep it inside folder , it should be inside htdocs

- can use function outside SwicthPath to show in all page

## การเขียน PHP แบบ รวมศูนย์ ( SPA )

 

## นี่เป็น Starter template สำหรับการเริ่มต้น

 - ใน RootContent function ตามภาพด้านล่างจะเป็นการ return ค่าเพื่อไปแสดงผลยังหน้า index ซึ่งภายในจะมี headerSub function และ SwitchPath

- สำหรับ headerSub จะเป็นการเขียนนอก SwitchPath เพื่อให้ปรากฏไปยังทุกหน้า
- ส่วน SwitchPath และ Route ที่อยู่ภายในนั้นจะเป็นการกำหนด path และ function ของแต่ละหน้า เช่น '/about' ก็ให้ return function ที่เป็นหน้า about ทั้งนี้สามารถกำหนด path ได้ตามต้องการ ส่วน '*' ตามในภาพนั้นจะเป็นการกำหนดให้ตรงกับทุก path เพื่อดัก error กรณีผู้ใช้เข้าไม่ถูก path
- จากภาพด่านล่าง จะเห็นได้ว่าใน Route มีการใส่ '/about/:' ตัว : จะเป็นการบอกว่ายังมี path ต่อจาก about อีก ซึ่งจะสามารถเป็นอะไรก็ได้ เช่น /about/hello หรือ /about/world หรืออะไรก็าตามที่มีต่อก็จะตรงทั้งหมด
![ภาพอธิบาย SwitchPath, Route](https://video.fubp1-1.fna.fbcdn.net/v/t39.30808-6/283956832_383669620391036_6381093354251771808_n.png?_nc_cat=104&ccb=1-7&_nc_sid=730e14&_nc_ohc=5MrkmPufqC8AX-e16V5&_nc_ht=video.fubp1-1.fna&oh=00_AT819ccn5N8bKwBh8MOdNydEyrplzKOQw17d2-1uDECRXQ&oe=62959198)

- getParams function จะเป็นการเรียกใช้เพื่อได้ค่า path ลำดับสุดท้าย เช่น /about/value ก็จะได้ value มา 

- การเขียนแต่ละหน้าแบบ function และนำไปทำงานร่วมกับ Route แต่ละหน้าจะเปลี่ยนรูปแบบมาเป็นการเขียน function และ return ค่าแทนการเขียนแยกเป็นหน้าๆ ตามก่อน และยังสามารถทำงานประมวลผลใน function ได้ตามปกติ อย่างเช่น AboutPage() ที่เป็นหน้า about ที่สามารถเขียนประมวลผลใน function และสามารถเขียน function แยกย่อยได้อีก

![การเขียนในรูปแบบ function](https://video.fubp1-1.fna.fbcdn.net/v/t39.30808-6/284092315_383669660391032_6456551809828665011_n.png?_nc_cat=100&ccb=1-7&_nc_sid=730e14&_nc_ohc=RbKY1sRgZDkAX_ynaMV&_nc_ht=video.fubp1-1.fna&oh=00_AT9nabDBUuVl8W_aH5Y20vHD7I2sasxEEsnOaJVtCyiLsg&oe=62969905)

- การ import จะไม่ใช้ require หรือ include แต่จะใช้ import ซึ่งสามารถ import มาทั้ง folder ได้ เช่น import(‘./page/*’); ซึ่งควร import แต่ละไฟล์บน package.php เท่านั้น และระวังอย่า import ไฟล์หรือ folder ซ้ำ

![import file](https://video.fubp1-1.fna.fbcdn.net/v/t39.30808-6/284112008_383669723724359_5686521807214957204_n.png?_nc_cat=102&ccb=1-7&_nc_sid=730e14&_nc_ohc=AmDlj4a0brcAX8yIfNy&_nc_ht=video.fubp1-1.fna&oh=00_AT9nhxQL6AUCiIqGKS598F3CL1SB8tUMVCilFNMH1oRmlg&oe=62968D9F)

- เหมือนกับการเขียน SPA ทั่วๆ ไปที่ต้องนำไฟล์มาอยู่นอกสุด เช่น htdocs หาก git clone มาก็ให้นำไฟล์ที่อยู่ภายในออกมายัง htdocs ตามภาพที่เห็น

![htdocs](https://video.fubp1-1.fna.fbcdn.net/v/t39.30808-6/284246817_383669577057707_2152403264513107397_n.png?_nc_cat=105&ccb=1-7&_nc_sid=730e14&_nc_ohc=cYRDS2vDD-IAX8OpeT1&tn=tUFQlMH_65maGc9_&_nc_ht=video.fubp1-1.fna&oh=00_AT99f0nbXfLqs1Ai4HbZa3TzUliycIQTRH5hzsOSzgFMHw&oe=629615A7)

- เมื่อจะกำหนด title ควรใช้ title() และเขียน title ภายในเช่น title(“Home”) หรือตามภาพตัวอย่าง ซึ่งจะ return string ที่เป็น script ที่ใช้คำสั่ง javascript เพื่อเปลี่ยน title และไม่ควรใช้ช้ำซ้อน

