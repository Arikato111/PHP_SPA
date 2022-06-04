# PHP_SPA ( Release version )
# Starter template
## Get started

[PHP_SPA คืออะไร](#user-content-%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%82%E0%B8%B5%E0%B8%A2%E0%B8%99-php-%E0%B9%81%E0%B8%9A%E0%B8%9A-%E0%B8%A3%E0%B8%A7%E0%B8%A1%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C--spa---%E0%B9%81%E0%B8%95%E0%B9%88%E0%B8%81%E0%B9%87%E0%B8%A2%E0%B8%B1%E0%B8%87%E0%B8%A3%E0%B8%B1%E0%B8%99%E0%B8%9A%E0%B8%99%E0%B9%80%E0%B8%8A%E0%B8%B4%E0%B8%A3%E0%B9%8C%E0%B8%9F%E0%B9%80%E0%B8%A7%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%AD%E0%B8%A2%E0%B8%B9%E0%B9%88%E0%B8%94%E0%B8%B5-)

ไปที่ [Faster version](https://github.com/Arikato111/PHP_SPA/tree/faster#readme) หากต้องการเน้นประสิทธิภาพความเร็วโดยเฉพาะ

ไปที่ [Simple version](https://github.com/Arikato111/PHP_SPA/tree/simple#readme) หากต้องการการใช้งานง่ายเป็นหลัก

**ติดตั้ง**
- ติดตั้งผ่านคำสั่ง php , โดยคัดลอกโค้ดด้านล่างไปวางไว้ที่ index.php แล้วเข้าหน้า index.php ผ่านเบราว์เซอร์ รอสักครู่ เป็นอันเสร็จสิ้น
```
$module  =  file_get_contents('https://raw.githubusercontent.com/Arikato111/PHP_SPA/installer/index.php');
file_put_contents('index.php', $module);
header('Location: /');
```
---
- ติดตั้งผ่าน git
ใช้คำสั่ง git clone เพื่อดาวน์โหลด template 
`git clone https://github.com/Arikato111/PHP_SPA.git`
หลังจากนั้นจะได้โฟลเดอร์ **PHP_SPA** มา ให้ย้ายไฟล์ทั้งหมดในโฟลเดอร์นั้นไปยัง htdocs ( ในกรณีใช้ Xampp ) โดยไม่ต้องสร้างโฟลเดอร์เพิ่มใน htdocs และใช้งานตามปกติ

---
- ติดตั้งผ่าน zip file ดาวน์โหลด zip file 
click [ดาวน์โหลด](https://github.com/Arikato111/PHP_SPA/archive/refs/heads/Release.zip) จากนั้นจะได้ไฟล๋ **PHP_SPA-Release.zip** ในไฟล์ zip จะมีโฟลเดอร์ชื่อเดียวกันอยู่ ให้แตกไฟล์นำโฟลเดอร์นั้นออกมา แล้วเข้าไปยังโฟลเดอร์นั้น 
ย้ายไฟล์ทั้งหมดไปที่ htdocs ( ในกรณีใช้ Xampp ) โดยไม่ต้องสร้างโฟลเดอร๋เพิ่มใน htdocs และใช้งานตามปกติ

---
- ใช้งานผ่านลิงก์โดยไม่ต้องโหลดติดตั้งไฟล์
นำโค้ดด้านล่างไปวางไว้บนสุดในหน้า index.php จากนั้นจะสามารถใช้คำสั่ง SwitchPath Route getPath getParams title ได้ตามปกติ แม้ตัวโปรแกรมที่ใช้เขียนโค้ดจะขึ้น error แต่ก็ยังสามารถใช้งานได้ตามปกติ อย่างไรก็ตาม เป็นวิธีที่ไม่แนะนำ
```
$module  =  file_get_contents('https://raw.githubusercontent.com/Arikato111/PHP_SPA/Release/modules/wisit-single-page.php');

eval(substr($module,  6));
```


## การเขียน PHP แบบ รวมศูนย์ ( SPA ) ( แต่ก็ยังรันบนเชิร์ฟเวอร์อยู่ดี )
 
## นี่เป็น Starter template สำหรับการเริ่มต้น
[ติดตั้ง](#user-content-get-started)

- จะเปลี่ยนการเขียนเป็นในรูปแบบ function แทนการเขียนแยกเป็นหน้าๆ ตามภาพด้านล่าง และต้องตั้งชื่อ function ให้ตรงกับชื่อไฟล์เพื่อทำงานร่วมกับ Route, SwitchPath
![Page Function](https://video.fubp1-1.fna.fbcdn.net/v/t39.30808-6/285375163_389169656507699_8902516487686966315_n.png?_nc_cat=104&ccb=1-7&_nc_sid=730e14&_nc_ohc=SBI_jLWQu0sAX-Y4Z7b&_nc_ht=video.fubp1-1.fna&oh=00_AT-u0OUFgEB3rY9V4es1-iUHHEaBjUWJ1KJsZgs4fFXE2g&oe=629EC2C5)

 - ใน Main function ตามภาพด้านล่างจะเป็นการ return ค่าเพื่อไปแสดงผลยังหน้า index ซึ่งภายในจะมี SwitchPath และ Route

![อาจเป็นรูปภาพของ กำลังนั่ง](https://video.fubp1-1.fna.fbcdn.net/v/t39.30808-6/285473366_389169629841035_1969473450733964415_n.png?_nc_cat=108&ccb=1-7&_nc_sid=730e14&_nc_ohc=Q8b3JQdaR54AX9zzc7e&_nc_ht=video.fubp1-1.fna&oh=00_AT8GRTsqFPQH_R0ae9ncQJqK65Ue7nf91Dke_B_O8daJug&oe=629E4C66)


- ส่วน SwitchPath และ Route ที่อยู่ภายในนั้นจะเป็นการกำหนด path และ function ของแต่ละหน้า เช่น '/about' ก็ให้ return function ที่เป็นหน้า about ทั้งนี้สามารถกำหนด path ได้ตามต้องการ ส่วน '*' ตามในภาพนั้นจะเป็นการกำหนดให้ตรงกับทุก path เพื่อดัก error กรณีผู้ใช้เข้าไม่ถูก path
- Route ต้องใส่ path และ directory ของ Page function โดยไม่ต้องใส่นามสกุลของไฟล์ ( .php )

![enter image description here](https://video.fubp1-1.fna.fbcdn.net/v/t39.30808-6/285822954_389177159840282_4358641054589664898_n.png?_nc_cat=102&ccb=1-7&_nc_sid=dbeb18&_nc_ohc=OE-8vAWeDKEAX_J0ERH&_nc_ht=video.fubp1-1.fna&oh=00_AT_tjcxRkszbbObKYCXQJxzEJlUWtWd0K0Mz6vrJw_SQmw&oe=629FAB71)
- จากภาพด้านบน จะเห็นได้ว่าใน Route มีการใส่ '/about/:' ตัว : จะเป็นการบอกว่า path ในตำแหน่งนั้นจะสามารถเป็นอะไรก็ได้ เช่น /about/hello หรือ /about/world หรืออะไรก็ตามที่มีต่อก็จะตรงทั้งหมด ชึ่งสามารถเขียนซ้อนกันได้เช่น /:/: ก็จะเป็นการอนุญาตให้ path ในสองตำแหน่งนั้นเป็นอะไรก็ได้

- getParams function จะเป็นการเรียกใช้เพื่อได้ค่า path ลำดับสุดท้าย เช่น /about/value ก็จะได้ value มา และสามารถกำหนดตำแหน่งได้ โดยเริ่มนับจากตำแหน่งที่ 0 เช่น getParams(0) ก็จะได้ about

- การเขียนแต่ละหน้าแบบ function และนำไปทำงานร่วมกับ Route แต่ละหน้าจะเปลี่ยนรูปแบบมาเป็นการเขียน function และ return ค่าแทนการเขียนแยกเป็นหน้าๆ ตามก่อน และยังสามารถทำงานประมวลผลใน function ได้ตามปกติ และสามารถเขียน function แยกย่อยได้อีก

- หากต้องการเชื่อมฐานข้อมูลควรใช้ `$GLOBALS['con']` เพื่อให้สามารถใช้ใน function ต่างๆ โดยที่ตัว function ไม่ต้องรับค่า
- หากต้องการ require ไฟล์ต่างๆ เข้ามาใช้งานควร เริ่มจากโฟล์เดอร์นอกสุด เพราะการทำงานทั้งหมดจะอยู่บนหน้า index.php
- หากต้องการใช้ src="" ใน html tag ควรเขียนโดยเริ่มต้นด้วย / แบบ src="/folder/file" ไม่ควรเขียนแบบ src="./folder/file" หรือ src="folder/file" สำหรับ link url ยังสามารถเขียนได้ปกติ 

- เหมือนกับการเขียน SPA ทั่วๆ ไปที่ต้องนำไฟล์มาอยู่นอกสุด เช่น htdocs หาก git clone มาก็ให้นำไฟล์ที่อยู่ภายในโฟล์เดอร์ **PHP_SPA** ออกมายัง htdocs ตามภาพที่เห็น

- เมื่อจะกำหนด title ควรใช้ title() และเขียน title ภายในเช่น title(“Home”) หรือตามภาพตัวอย่าง ซึ่งจะ return string ที่เป็น script ที่ใช้คำสั่ง javascript ดังนั้นต้องใช้ . เพื่อต่อ string เข้ากับส่วนโค้ด html เพื่อเปลี่ยน title และไม่ควรใช้ช้ำซ้อน

- ภาพอย่างง่ายที่อธิบายถึงการทำงาน
![enter image description here](https://video.fubp1-1.fna.fbcdn.net/v/t39.30808-6/285766996_389190946505570_154817679611289759_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=730e14&_nc_ohc=pX2dOit_f6MAX_eZBwn&_nc_ht=video.fubp1-1.fna&oh=00_AT_dxT0syDvlB6_z-c3cT7A4c6TgQnQwWppN-MHZx2Qfmw&oe=629FD480)

- Tip! หากต้องการเขียน function สำหรับใช้งานเฉพาะใน function page ให้เขียนตามภาพด้านล่าง
![อาจเป็นรูปภาพของ กำลังนั่ง](https://video.fubp1-1.fna.fbcdn.net/v/t39.30808-6/284921350_386554703435861_6912134901672407422_n.png?_nc_cat=105&ccb=1-7&_nc_sid=730e14&_nc_ohc=m353nNF9-2gAX9EOw0X&tn=tUFQlMH_65maGc9_&_nc_ht=video.fubp1-1.fna&oh=00_AT9w4SY7TrhhinH6dccjayTJNpOF0bjtRx9vPzI-Hh1JUA&oe=629FFD0D)
