
# PHP_SPA ( Release 3.0 )
## การเขียน PHP แบบ รวมศูนย์ ( SPA ) ( แต่ก็ยังรันบนเชิร์ฟเวอร์อยู่ดี )

## นี่เป็น Starter template
---
### What's news!!
- ### ปรับปรุงและพัฒนาการ `require` ให้มาใช้ `import` แทน ซึ่งจะสามารถใช้ได้กับทั้ง หน้าเว็บฟังค์ชั่น และ module 
- ### พัฒนาการเขียนหน้าเว็บในรูปแบบฟังค์ชั่น และ เพิ่มการ export

---
### หัวข้อ
[PHP_SPA คืออะไร](#php_spa-คืออะไร)

[ติดตั้ง](#user-content-ติดตั้ง)

[การเขียนหน้าเว็บในรูปแบบฟังค์ชั่น](#user-content-การเขียนหน้าเว็บในรูปแบบฟังค์ชั่น)

[import](#import)

[การใช้ `wisit-router` module](#user-content-การใช้-wisit-router-module)

[การใช้ `SwitchPath` และ `Route`](#การใช้-switchpath-และ-route)

[การใช้ `getParams`](#การใช้-getParams)

[การใช้ `getPath`](#การใช้-getpath)

[การใช้ `title`](#การใช้-title)


---  
### PHP_SPA คืออะไร
- **PHP_SPA** คือการเขียน PHP ในรูปแบบ single page ซึ่งจะทำงานบนหน้า index เพียงหน้าเดียว และมีการเขียนแต่ละหน้าในรูปแบบ function สำหรับ path จะสามารถกำหนดได้อย่างอิสระและไม่ขึ้นอยู่กับที่อยู่ของไฟล์ ซึ่งจะใช้ Route เป็นตัวกำหนด นอกจากนั้นยังสามารถกำหนด path แบบ dynamic ได้ และยังมีการรับค่าจาก path ได้อีก ซึ่งจะอธิบายในหัวข้อต่อๆ ไป

-  **นี่เป็น Release version 2.0** ที่พัฒนาต่อยอดให้ใกล้เคียงกับการเขียน React มากขึ้น และ**ที่สำคัญ** ได้ปรับปรุงการเขียนให้สามารถ `require` ซ้ำได้ และเก็บค่าที่ `require` มาลงในตัวแปรได้
---

### การเขียนหน้าเว็บในรูปแบบฟังค์ชั่น
- การเขียนแต่ละหน้าจะเปลี่ยนไปเป็นการเขียนเป็นในรูปแบบ function แทนการเขียนแยกเป็นหน้าๆ ตามปกติ
- ตัวอย่างการเขียน และ อธิบายองค์ประกอบต่างๆ

```php
<?php
$title = import('wisit-router/title');

$Home = function () use ($title) {
  $title('Home'); // use title function to change title
  return <<<HTML
    <div>
      <div>Hello world</div>
    </div>
    HTML;
};

export: $Home;
```
- `$title = import('wisit-router/title');`
  - ส่วนแรกคือการ `import` module  เข้ามาใช้งาน ซึ่งจะอธิบายโดยละเอียดในหัวข้อ `import`
- `$Home` และ `use` 
  - อย่างที่ได้กล่าวไปว่าเป็นการเขียนในรูปแบบฟังค์ชั่น `$Home` ก็เป็นฟังค์ชั่นๆ หนึ่งที่จะ return ค่าไปแสดงผลเป็น HTML โดยมีการใช้ `export` ซึ่งนอกจากฟังค์ชั่น $Home แล้วก็สามารถสร้างฟังค์ชั่นอื่นๆ มาทำงานร่วมกันได้แต่อย่างไรก็ตาม จะ `export` ได้เพียงฟังค์ชั่นเดียว 
  - เมื่อมีพังค์ชั่นอื่นหรือ modules อื่นที่ import เข้ามาแล้วต้องการให้มาทำงานภายในฟังค์ชั่นที่ต้องการ สามารถใช้ `use ()` ได้ และใส่ตัวแปรที่ต้องการให้ทำงานภายในฟังค์ชั่นลงไป
  - **ข้อควรระวังสำหรับการสร้างฟังค์ชั่น ไม่ควรประกาศฟังค์ชั่นที่เป็นสถานะ Global ( ฟังค์ชั่นตามแบบปกติ) แนะนำให้ประกาศลงในตัวแปรเท่านั้น เพื่อป้องกัน error ในกรณีมีการ import ซ้ำ
### import
- เพื่อให้สามารถเขียนหน้าเว็บในรูปแบบฟังค์ชั่น ควรใช้ `import` แทนการ `require` ซึ่งจะมีตัวอย่างและวิธีใช้กับประเภทไฟล์ต่างๆ ดังนี้
#### การ import modules
- ตัวอย่าง การ import wisit-router
```php
['Route' => $Route] = import('wisit-router');
```
-  สำหรับ `modules` นั้นจะใส่เพียงชื่อของ modules ที่ต้องการเท่านั้น 
  
-  หาก modules ที่ต้องการนั้นรองรับการ import แบบ ไฟล์ย่อยๆ ก็สามารถ import ได้ เช่น
```php
$title = import('wisit-router/title');
```
- จะสังเกตุว่าไม่ต้องใส่นามสกุลของไฟล์ (.php)
#### การ import ไฟล์อื่นๆ รวมทั้งไฟล์เว็บแบบฟังค์ชึ่น
 - ตัวอย่าง
```php
$HomePage = import('./src/Home');
```
- จำเป็นต้องใส่ที่อยู่ไฟล์โดยอ้างอิงจาก path นอกสุดเสมอ และ จำเป็นต้องใส่ `./` หน้าสุดข้องที่อยู่ไฟล์ตามตัวอย่าง
- และ เหมือนกับ modules เมื่อกี้คือ **ไม่ต้องใส่นามสกุลของไฟล์**
---
### การใช้ module

- ในส่วน module นั้น ใน starter template จะมีโฟลเดอร์ modules อยู่ ซึ่งจะเป็นการเก็บไฟล์ module ต่างๆ ซึ่งได้มีมาให้ใน template และอาจจะมีการเพิ่มมาใช้จากที่อื่นอีก

- การเรียกใช้ module นั้นจะขึ้นอยู่กับการออกแบบของคนที่เขียน module นั้นๆ ขึ้นมา ซึ่งโดยธรรมดาแล้วจะเป็นการใช้ `import`  มาใช้งานโดยสร้างตัวแปรมารับค่าไว้ เหมือนกันกับการ `import` Page function ซึ่งดูวิธี import ที่ข้างบน

- หากต้องการ **สร้าง** `module`เองนั้นมีข้อกำหนดดังนี้
	- 0 ไฟล์หลักใน `module` จะต้องชื่อ `main.m.php` เท่านั้น
	- 1 ชื่อโฟลเดอร์ของ `module` คือชื่อของ `module` 
	- 2 หากจะทำให้มีการ `import` ซ้ำได้ และมีตัวแปรมารับค่า ต้องเขียนภายในขอบเขตการ `return`  เช่นเดียวกับการเขียน Page function ซึ่งจะ `return` เป็น function , variable, array, obj ก็ได้ทั้งนั้น
---
### การใช้ `wisit-router` module
- `wisit-router` จะประกอบไปด้วย function ต่างๆ ดังนี้
	- SwitchPath
	- Route
	- getParams
	- getPath
	- title

- สามารถ import ได้ 3 วิธีดังนี้
#### **1 . การ `import` ในรูปแบบ `object`** ที่จะต้องประกาศตัวแปรมารับค่า และตัวแปรนั้นจะมี `type` เป็น `object` ที่มีทุก `function` อยู่ภายในทั้งหมด
```php
[$wisit-router] = import('wisit-router');
```
- ตัวแปรที่มารับค่าคือ `$wisit-router` ซึ่งต้องเขียนภายใน [ ]

#### **2 . การ `import` เฉพาะ `function` ที่ต้องการ** ซึ่งจะมีการ `import` ไม่ต่างจากข้อ 1 แต่มีสิ่งที่ต่างออกไปก็คือ รูปแบบการเขียนและตัวแปรมารับค่า ที่จะเขียนแบบนี้ `['name'=>$func]` โดย `name` คือชื่อฟังค์ชั่นที่ต้องการ และ `$func` คือตัวแปรที่มารับค่า ยกตัวอย่างเช่น
```php
['SwitchPath' => $SwitchPath, 'Route' => $Route] = module('wisit-router');
```

- **3 . การ `require` แบบปกติ** ซึ่งจะ `require` เฉพาะฟังค์ชั่นที่ต้องการ ซึ่งในโฟลเดอร์ของ `module` นั้นจะมีการเขียน `function` แยกเป็นไฟล์ๆ ซึ่งสามารถทำการ `require` จากไฟล์นั้นๆ ได้เลย เช่น

```php
$getPath = require('./modules/wisit-router/getPath.php');
```
- สังเกตุว่าไฟล์ที่ `require` มานั้นจะไม่ใช่ `main.m.php` ตามปกติ ซึ่งในที่นี้เป็น `getPath.php` คือ `getPath function` นั่นเอง และตัวแปรที่มารับค่านั้นก็สร้างตามปกติได้เลย
- ข้อควรระวังคือ วิธีนี้จะไม่สามารถใช้ `module()` ในการ `require` ได้ 

---
### การใช้ `SwitchPath` และ `Route`
- `SwitchPath` และ `Route` จะเป็นตัวที่ทำให้สามารถกำหนด path ได้อย่างอิสระและมีการทำงานที่เชื่อมโยงกับ Page function อื่น นอกจากนั้นยังสามารถกำหนด path ให้เป็น dynamic ได้  ซึ่งสองตัวนี้จะต้องทำงานร่วมกัน
```php
<?php
return  function () {
	['SwitchPath' => $SwitchPath, 'Route' => $Route] =  module('wisit-router');
	$HomePage  =  require('./src/Home.php');
	$Tutorial  =  require('./src/Tutorial.php');
	
	return  $SwitchPath(
		$Route('/tutorial/:', fn () => $Tutorial()),
		$Route('/tutorial', fn () => $Tutorial()),
		$Route('/', fn () => $HomePage()),
		$Route('*', fn () => 'Not found page'),
	);
};
```
- Route จะเป็น function ที่จะรับค่า path และ callback function ที่จะ `return` เป็น Page function  หาก path ที่ user เข้ามาตรงกับที่กำหนดไว้ก็จะทำการ `return` Page function นั้นๆ ออกไป 
ในการกำหนด path หากต้องการให้ path ตำแหน่งนั้นๆ เป็นแบบ dynamic หรือก็คือการอนุญาตให้ path ในตำแหน่งนั้นๆ เป็นค่าอะไรก็ได้ ก็ให้ใส่ `:` ลงในตำแหน่งนั้น ตามโค้ดตัวอย่าง
เช่น ตามตัวอย่างที่มีการกำหนดเป็น `/tutorial/:` นั้นสามารถทำให้ผู้ใช้เข้ามาที่ path `/tutorial/view` `/tutorial/about` `/tutorial/whatever` หรืออะไรก็แล้วแต่ ตัว Route ก็จะเช็คตรงทั้งหมด

	การกำหนดให้เป็น `'*'` คือการกำหนดให้ตรงเสมอ เพื่อดัก error ของผู้ใช้ กรณีเข้าไม่ถูก

	Route นั้นจะเขียนภายใน SwitchPath และคั่นด้วย `,` ซึ่ง Route จะมีกี่ตัวก็ได้

- SwitchPath จะเป็นตัวที่คอยรับ Route ไว้ หากว่า การเช็ค path ของ Route นั้นตรง ตัว Route ก็จะส่งค่ามาให้ SwitchPath และทำการสั่ง run callback function ที่มีการใส่ลงใน Route และจะได้มาเป็น เนื้อหา html ของ Page function นั้นๆ และ SwithPath จะ `return` ต่อไปในรูปแบบของ `string` ซึ่งสามารถนำไปต่อ string เข้ากับโค้ด html อื่นๆ ต่อได้อีก
---
### การใช้ `getParams`
- getParams คือตัวที่จะดึง path ในตำแหน่งสุดท้ายมา เช่น `/home/view`  getParams ก็จะ `return` view มา แต่ว่าหากไม่อยากได้ตำแหน่งสุดท้าย ก็สามารถระบุตำแหน่งลงใน function ได้ โดยเริ่มนับจากตำแหน่งที่ 0
ตัวอย่างโค้ด
```php
<?php
return  function () {
	[$wisit_router] =  module('wisit-router')
	$params  =  $wisit_router->getParams();
	return  $wisit_router->title('title') .
		<<<HTML
			<div>
				<div>hello world</div>
				{$params}
			</div>
		HTML;
};
```
---
### การใช้ `getPath`
- getPath นั้นหลักการทำงานคล้ายคลึงกับ getParams โดยที่ getParams จะได้มาเพียง path ตำแหน่งใดตำแหน่งหนึ่งเท่านั้น แต่ getPath จะได้มาทุกตำแหน่ง หรือก็คือได้ path แบบเต็มมาใช้งานนั่นเอง ซึ่งการใช้งานก็จะเหมือนกับ getParams เลย
```php
<?php
return  function () {
	[$wisit_router] =  module('wisit-router')
	$path  =  $wisit_router->getPath();
	return  $wisit_router->title('title') .
		<<<HTML
			<div>
				<div>hello world</div>
				{$path}
			</div>
		HTML;
};
```

--- 
### การใช้ `title`
- เพราะเป็นการเขียนในรูปแบบ Page function ที่จะทำงานบน index.php เท่านั้น จึงทำให้การกำหนด title ไม่สามารถทำได้แบบปกติ
- ในเวอร์ชั่นนี้ได้ทำการปรับปรุงทำให้สามารถใช้ `title();` โดยไม่ต้องทำการต่อ string แต่สามารถเรียกใช้เดี่ยวๆ ได้ และไม่ได้ใช้ `javascript` ในการเปลี่ยน title
```php
<?php
return  function () {
	[$wisit_router] =  module('wisit-router')
	$wisit_router->title('Home');
	return <<<HTML
			<div>
				<div>This is Home Page</div>
			</div>
		HTML;
};
```
---
### ติดตั้ง
-  วิธีที่ 1 **ติดตั้งผ่านคำสั่ง php** , โดยคัดลอกโค้ดด้านล่างไปวางไว้ที่ index.php แล้วเข้าหน้า index.php ผ่านเบราว์เซอร์ รอสักครู่ เป็นอันเสร็จสิ้น

```php
<?php
eval(file_get_contents('https://raw.githubusercontent.com/Arikato111/PHP_SPA/installer/Release3-0.txt'));
```

- สามารถใช้โค้ดด้านบนหรือด้านล่างก็ได้ เลือกอันใดอันหนึ่ง


```php
<?php
$module  =  file_get_contents('https://raw.githubusercontent.com/Arikato111/PHP_SPA/installer/Release3-0.php');
file_put_contents('index.php', $module);
header('Location: /');
```

 - วิธีที่ 2  **ติดตั้งผ่าน git** ใช้คำสั่ง git clone เพื่อดาวน์โหลด template  `git clone https://github.com/Arikato111/PHP_SPA.git`  หลังจากนั้นจะได้โฟลเดอร์  **PHP_SPA**  มา ให้ย้ายไฟล์ทั้งหมดในโฟลเดอร์นั้นไปยัง htdocs ( ในกรณีใช้ Xampp ) โดยไม่ต้องสร้างโฟลเดอร์เพิ่มใน htdocs และใช้งานตามปกติ อย่าลืมเช็ค branch ว่าตรงกับที่ต้องการไหม หากไม่ก็ทำการเปลี่ยน branch
 
- วิธีที่ 3 **ติดตั้งผ่าน zip file** ดาวน์โหลด zip file click  [ดาวน์โหลด](https://github.com/Arikato111/PHP_SPA/archive/refs/heads/Release2.1.zip)  จากนั้นจะได้ไฟล๋  **PHP_SPA-Release2.0.zip**  ในไฟล์ zip จะมีโฟลเดอร์ชื่อเดียวกันอยู่ ให้แตกไฟล์นำโฟลเดอร์นั้นออกมา แล้วเข้าไปยังโฟลเดอร์นั้น ย้ายไฟล์ทั้งหมดไปที่ htdocs ( ในกรณีใช้ Xampp ) โดยไม่ต้องสร้างโฟลเดอร๋เพิ่มใน htdocs และใช้งานตามปกติ
