# PHP_SPA
# Starter template
## Get started

[PHP_SPA คืออะไร](#user-content-%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%82%E0%B8%B5%E0%B8%A2%E0%B8%99-php-%E0%B9%81%E0%B8%9A%E0%B8%9A-%E0%B8%A3%E0%B8%A7%E0%B8%A1%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C--spa---%E0%B9%81%E0%B8%95%E0%B9%88%E0%B8%81%E0%B9%87%E0%B8%A2%E0%B8%B1%E0%B8%87%E0%B8%A3%E0%B8%B1%E0%B8%99%E0%B8%9A%E0%B8%99%E0%B9%80%E0%B8%8A%E0%B8%B4%E0%B8%A3%E0%B9%8C%E0%B8%9F%E0%B9%80%E0%B8%A7%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%AD%E0%B8%A2%E0%B8%B9%E0%B9%88%E0%B8%94%E0%B8%B5-)

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
click [ดาวน์โหลด](https://github.com/Arikato111/PHP_SPA/archive/refs/heads/Release.zip) จากนั้นจะได้ไฟล๋ **PHP_SPA-Release.zip** ในไฟล๋ zip จะมีโฟลเดอร์ชื่อเดียวกันอยู่ ให้แตกไฟล์นำโฟลเดอร์นั้นออกมา แล้วเข้าไปยังโฟลเดอร์นั้น 
ย้ายไฟล์ทั้งหมดไปที่ htdocs ( ในกรณีใช้ Xampp ) โดยไม่ต้องสร้างโฟลเดอร๋เพิ่มใน htdocs และใช้งานตามปกติ

---
- ใช้งานผ่านลิงก์โดยไม่ต้องโหลดติดตั้งไฟล์
นำโค้ดด้านล่างไปวางไว้บนสุดในหน้า index.php จากนั้นจะสามารถใช้คำสั่ง SwitchPath Route getPath getParams import title ได้ตามปกติ แม้ตัวโปรแกรมที่ใช้เขียนโค้ดจะขึ้น error แต่ก็ยังสามารถใช้งานได้ตามปกติ อย่างไรก็ตาม เป็นวิธีที่ไม่แนะนำ
```
$module  =  file_get_contents('https://raw.githubusercontent.com/Arikato111/PHP_SPA/Release/modules/wisit-single-page.php');

eval(substr($module,  6));
```


## การเขียน PHP แบบ รวมศูนย์ ( SPA ) ( แต่ก็ยังรันบนเชิร์ฟเวอร์อยู่ดี )
 
## นี่เป็น Starter template สำหรับการเริ่มต้น
[ติดตั้ง](#user-content-get-started)

- จะเปลี่ยนการเขียนเป็นในรูปแบบ function แทนการเขียนแยกเป็นหน้าๆ ตามภาพด้านล่าง
![enter image description here](https://video.fubp1-1.fna.fbcdn.net/v/t39.30808-6/284551698_384648273626504_1609400707294192179_n.png?_nc_cat=106&ccb=1-7&_nc_sid=730e14&_nc_ohc=pwDeTxlOs3cAX_2vnRJ&_nc_ht=video.fubp1-1.fna&oh=00_AT8PjnA5Xo7Emvv9If8beQSA0wnKvJ0lbM-ICtP0spiCIg&oe=6295D40C)

 - ใน RootContent function ตามภาพด้านล่างจะเป็นการ return ค่าเพื่อไปแสดงผลยังหน้า index ซึ่งภายในจะมี headerSub function และ SwitchPath

![อาจเป็นรูปภาพของ กำลังนั่ง](https://video.fubp1-1.fna.fbcdn.net/v/t39.30808-6/284486730_384648380293160_6865668386188902373_n.png?_nc_cat=111&ccb=1-7&_nc_sid=730e14&_nc_ohc=jkSXNjer7-8AX9SmY6f&_nc_ht=video.fubp1-1.fna&oh=00_AT_VhG7QMRCMM4-R6YS_JFD3gM6TTNLw50hlMZQpF_FUFQ&oe=6295C8A6)

- สำหรับ headerSub จะเป็นการเขียนนอก SwitchPath เพื่อให้ปรากฏไปยังทุกหน้า
- ส่วน SwitchPath และ Route ที่อยู่ภายในนั้นจะเป็นการกำหนด path และ function ของแต่ละหน้า เช่น '/about' ก็ให้ return function ที่เป็นหน้า about ทั้งนี้สามารถกำหนด path ได้ตามต้องการ ส่วน '*' ตามในภาพนั้นจะเป็นการกำหนดให้ตรงกับทุก path เพื่อดัก error กรณีผู้ใช้เข้าไม่ถูก path
- จากภาพด้านบน จะเห็นได้ว่าใน Route มีการใส่ '/about/:' ตัว : จะเป็นการบอกว่า path ในตำแหน่งนั้นจะสามารถเป็นอะไรก็ได้ เช่น /about/hello หรือ /about/world หรืออะไรก็ตามที่มีต่อก็จะตรงทั้งหมด ชึ่งสามารถเขียนซ้อนกันได้เช่น /:/: ก็จะเป็นการอนุญาตให้ path ในสองตำแหน่งนั้นเป็นอะไรก็ได้

- getParams function จะเป็นการเรียกใช้เพื่อได้ค่า path ลำดับสุดท้าย เช่น /about/value ก็จะได้ value มา และสามารถกำหนดตำแหน่งได้ โดยเริ่มนับจากตำแหน่งที่ 0 เช่น getParams(0) ก็จะได้ about

- การเขียนแต่ละหน้าแบบ function และนำไปทำงานร่วมกับ Route แต่ละหน้าจะเปลี่ยนรูปแบบมาเป็นการเขียน function และ return ค่าแทนการเขียนแยกเป็นหน้าๆ ตามก่อน และยังสามารถทำงานประมวลผลใน function ได้ตามปกติ อย่างเช่น AboutPage() ที่เป็นหน้า about ที่สามารถเขียนประมวลผลใน function และสามารถเขียน function แยกย่อยได้อีก

![การเขียนในรูปแบบ function](https://video.fubp1-1.fna.fbcdn.net/v/t39.30808-6/284306690_384648356959829_6978952492087751309_n.png?_nc_cat=106&ccb=1-7&_nc_sid=730e14&_nc_ohc=JTw3d4Xf-bAAX-8C_H-&_nc_ht=video.fubp1-1.fna&oh=00_AT9e6d7dAWNm_axSf5XclTaTYFzVN3F4Yshc0-CkoVo0CQ&oe=6295E3AF)

- หากต้องการเชื่อมฐานข้อมูลควรใช้ $GLOBALS['con'] เพื่อให้สามารถใช้ใน function ต่างๆ โดยที่ตัว function ไม่ต้องรับค่า

- หากต้องการใช้ src="" ใน html tag ควรเขียนโดยเริ่มต้นด้วย / แบบ src="/folder/file" ไม่ควรเขียนแบบ src="./folder/file" หรือ src="folder/file" สำหรับ link url ยังสามารถเขียนได้ปกติ 

- การ import จะไม่ใช้ require หรือ include แต่จะใช้ import ซึ่งสามารถ import มาทั้ง folder ได้ เช่น import(‘./page/*’); ซึ่งควร import แต่ละไฟล์บน package.php เท่านั้น และระวังอย่า import ไฟล์หรือ folder ซ้ำ

![import file](https://video.fubp1-1.fna.fbcdn.net/v/t39.30808-6/284483171_384648246959840_1120960904116659377_n.png?_nc_cat=108&ccb=1-7&_nc_sid=730e14&_nc_ohc=3QYcSRJC0XEAX_jIqfW&tn=tUFQlMH_65maGc9_&_nc_ht=video.fubp1-1.fna&oh=00_AT9rIou46tK7znRZoTRZGYumKqxfPCaWwX_O6D4Ht5TMkg&oe=6295F600)

- เหมือนกับการเขียน SPA ทั่วๆ ไปที่ต้องนำไฟล์มาอยู่นอกสุด เช่น htdocs หาก git clone มาก็ให้นำไฟล์ที่อยู่ภายในออกมายัง htdocs ตามภาพที่เห็น

![htdocs](https://video.fubp1-1.fna.fbcdn.net/v/t39.30808-6/284246817_383669577057707_2152403264513107397_n.png?_nc_cat=105&ccb=1-7&_nc_sid=730e14&_nc_ohc=cYRDS2vDD-IAX8OpeT1&tn=tUFQlMH_65maGc9_&_nc_ht=video.fubp1-1.fna&oh=00_AT99f0nbXfLqs1Ai4HbZa3TzUliycIQTRH5hzsOSzgFMHw&oe=629615A7)

- เมื่อจะกำหนด title ควรใช้ title() และเขียน title ภายในเช่น title(“Home”) หรือตามภาพตัวอย่าง ซึ่งจะ return string ที่เป็น script ที่ใช้คำสั่ง javascript ดังนั้นต้องใช้ . เพื่อต่อ string เข้ากับส่วนโค้ด html เพื่อเปลี่ยน title และไม่ควรใช้ช้ำซ้อน

- ภาพอย่างง่ายที่อธิบายถึงการทำงาน
![enter image description here](https://video.fubp1-1.fna.fbcdn.net/v/t39.30808-6/284201920_384550966969568_3371549898208564415_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=730e14&_nc_ohc=_OtNFuIvKiQAX8jWgYw&_nc_ht=video.fubp1-1.fna&oh=00_AT9NWpFp3rs8qByWswAJJCWHwZJbDqr4_4j_0o-87qDvPQ&oe=6294E363)

- Tip! หากต้องการเขียน function สำหรับใช้งานเฉพาะใน function page ให้เขียนตามภาพด้านล่าง
![enter image description here](https://video.fubp1-1.fna.fbcdn.net/v/t39.30808-6/284921350_386554703435861_6912134901672407422_n.png?_nc_cat=105&ccb=1-7&_nc_sid=730e14&_nc_ohc=Arn23hot07wAX96apmU&tn=tUFQlMH_65maGc9_&_nc_ht=video.fubp1-1.fna&oh=00_AT8uVSiqUOqYWbsCfn8GiU7yN9xoDXwhU3VXYtUWObecXw&oe=629A0E4D)

