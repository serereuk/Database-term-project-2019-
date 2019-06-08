2019 1학기 데이터베이스 term project
===============================

## 귀여운 모르모트 사이트로 실험자를 모집하세요!  

  ![alt text](/mall/images/pic1.png)  
  
 위 사진은 다음웹툰 '모르모트'에서 따왔습니다.
```
index.php -> 시작 홈페이지입니다.
```

## 수정사항

* git history에서 확인하실 수 있습니다
* 지난 텀프에서 감점당한 '수정 버튼' 2개 수정
* 1. dep_insert 에서 transaction 기능 추가 (mall/dep_insert.php)
* 2. delete 에서 transaction 기능 추가 (mall/delete.php)
* 3. modify 에서 transaction 기능 추가 (mall/modify.php)

## 지난 텀프에서 감점당한 부분 수정한 history 내역

![alt text](error1.png)  
![alt text](error2.png)  


## 나머지 transaction 부분에 대하 수정한 history 내역

https://github.com/serereuk/Database-term-project-2019-/commit/fdfba4a5415e7981fdd544a122465de7ede864d4

```
mysqli_query($conn, 'set autocommit = 0');
mysqli_query($conn, 'set transation isolation level serializable');
mysqli_query($conn, 'begin');

를 추가해주고

정상적으로 입력되면 commit, 안되면 rollback을 했습니다! 즉,

mysqli_query($conn, 'rollback');
mysqli_query($conn, 'commit');

도 추가했습니다!
```
