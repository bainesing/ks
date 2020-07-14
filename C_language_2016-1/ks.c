#include<stdio.h>
#include<stdlib.h>
#include<math.h>
#include<string.h>
#define N 5
//以上是头文件声明部分以及
//函数声明部分开始
void htos();
void root();
void pdrn();
void jzzh();
void zxgbs();
void jsyfk();
void jsdp();
void jsss();
void qpjf();
void jspz();
void hqfa();
void dhhm();
//函数声明部分结束
//******************************
//主函数，是整个程序的入口，用于显示菜单、调用子函数等。
void main(){
	while(1){//无限循环
		int p;
		//输出菜单
		printf("\t---------------menu----------------\n");
		printf("\t---------1.华氏度转摄氏度----------\n");
		printf("\t---------2.求一元二次方根----------\n");
		printf("\t---------3.  判断闰年    ----------\n");
		printf("\t---------4.求最小公倍数  ----------\n");
		printf("\t---------5. 计算应付款   ----------\n");
		printf("\t---------6.  统计得票    ----------\n");
		printf("\t---------7.  计算π值    ----------\n");
		printf("\t---------8.  判断素数    ----------\n");
		printf("\t---------9.解进制转换问题----------\n");
		printf("\t---------10. 选手最后得分----------\n");
		printf("\t---------11.  换钱方案   ----------\n");
		printf("\t---------12.查询电话号码 ----------\n");
		printf("\t---------0.  按E可赛艇   ----------\n");
		printf("\t-----------------------------------\n");
		printf("请输入选项序号：");
		scanf("%d",&p);

		switch(p){
			case 0:printf("感谢您的使用，再见！\n"),exit(0);break;//exit（0）表示退出
			case 1:htos();break;
			case 2:root();break;
			case 3:pdrn();break;
			case 9:jzzh();break;
			case 4:zxgbs();break;
			case 5:jsyfk();break;
			case 6:jsdp();break;
			case 7:jspz();break;
			case 8:jsss();break;
			case 10:qpjf();break;
			case 11:hqfa();break;
			case 12:dhhm();break;
			default:printf("您的输入有误，请重新输入。\n"),system("pause"),system("cls");//输出字符串，按任意键继续后清屏

		}
	}
}




//华氏度转摄氏度子函数，
//该函数没有返回值，因而用void格式。
void htos(){
	float f,c;
	printf("请输入华氏度:");
	scanf("%f",&f);
	c=5*(f-32)/9;
	printf("摄氏度为:%.2f.\n",c);
	system("pause");//按任意键继续函数
	system("cls");//清屏
}





//求一元二次方根子函数
void root(){
	float a,b,c,x1,x2,d;
	printf("请输入一元二次方程的三个系数a、b、c，以空格键分隔：");
	scanf("%f %f %f",&a,&b,&c);
	if(a==0){
		if(b==0){//判断a和b是否等于0，若b等于0则方程不成立，a=0则方程只是个一元一次方程。
			printf("您输入的数组无法构成方程。\n");
		}
		else{
			printf("您输入的数组只能构成一个一元一次方程，系统拒绝了您的计算请求。\n");
		}
	}
	else{//判断b*b-4*a*c
		d=b*b-4*a*c;
		if(d<0){
			printf("方程没有实数根。\n");
		}
		else{
			if(d>0){
				x1=(-b+(float)sqrt(d)/(2*a));
				x2=(-b-(float)sqrt(d)/(2*a));
				printf("方程有两个不等的实数根，他们分别是：\nx1=%10.2f,x2=%10.2f.\n",x1,x2);
			}
			else{
				printf("方程有两个相等的实数根，他们是：\nx1=x2=%10.2f.\n",-b/(2*a));
			}

		}
	}
	system("pause");//按任意键继续函数
	system("cls");//清屏
}




//判断闰年子函数。
void pdrn(){
	int year;
	printf("请输入一个年份");
	scanf("%d",&year);
	if(year%4==0&&year%100!=0||year%400==0){//核心：判断条件
		printf("%d是闰年。\n",year);
	}
	else{
		printf("%d不是闰年，请在菜单选择3，然后再试一次。\n",year);
	}
	system("pause");//按任意键继续函数
	system("cls");//清屏
}




//求最小公倍数子函数
void zxgbs(){
	int p,r,n,m,temp;
	printf("请输入两个整数，以空格分隔：");
	scanf("%d %d",&n,&m);
	if(n<m){//大小排序，服务于辗转相除。
		temp=n;
		n=m;
		m=temp;
	}
	p=n*m;//将n和m的乘积赋值给p
	//辗转相除开始
	while(m!=0){
		r=n%m;
		n=m;
		m=r;
	}
	//辗转相除结束
	printf("最小公倍数为：%d\n",p/n);
	system("pause");//按任意键继续函数
	system("cls");//清屏
}






//计算应付款
void jsyfk(){
	float i=0,a;
	printf("请输入商品价格,");
	while(1){
		printf("请输入：");
		scanf("%f",&a);
		if(a!=0){
			i=i+a;//数据累加
		}
		else{
			break;//结束循环
		}
	}
	printf("顾客应付款：%.2f\n",i);
	system("pause");//按任意键继续函数
	system("cls");//清屏
}






//计算选手得票子函数
void jsdp(){
		int p[4]={0,0,0,0},i;
	while(1){
		printf("请输入对应选手序号，输入“-1”停止统计票数\n");
		printf("请输入序号：");							//提示完成输出序号
		scanf("%d",&i);
		if(i>=0&&i<=3)
			p[i]++;
		else if(i>3)
			printf("输入无效");
			else break;
	}
	printf("计票结束\n1号选手共得票%d；\n2号选手共得票%d；\n3号选手共得票%d；\n此外，还有%d的观众在本次投票中选择弃权。\n",p[1],p[2],p[3],p[0]);
	system("pause");//按任意键继续函数
	system("cls");//清屏
}






//计算π值
/*************修改！该函数运行机制不符合要求**************/

/************bainesing最后修改于 2015年1月7日*************/

void jspz(){
	int s=1;
	float n=1.0f,t=1.0f,sum=0.0f;
	while((fabs(t))>=1e-6){
		sum=sum+t;
		n=n+2;
		s=-s;
		t=s/n;
	}
	//sum=sum*4;
	printf("π=%.6f\n",sum*4);

	system("pause");//按任意键继续函数
	system("cls");//清屏
}










//判断是否是素数
void jsss(){
	int m,i,k;
	printf("请输入任意整数，按回车键继续：");
	scanf("%d",&m);
	k=(int)sqrt(m);//对m求根，并强制转换数据类型
	for(i=2;i<=k;i++)//这行代码的条件表示将2-k之间的数字对m求余一遍
		if(m%i==0) break;
		if(i>=k+1)
			printf("%d是素数。\n",m);
		else
			printf("%d不是素数。\n",m);
	system("pause");//按任意键继续函数
	system("cls");//清屏
}





//计算进制转换
//以下是进制转换标准输入输出函数
void jzzh(){
	int d;
	int a[30];//定义数组a[30]，不用pa数字有多大
	int i=0,rem;
	printf("请输入一个十进制的正整数：\n");
	scanf("%d",&d);
//求余，将余数转移进数组a[30]开始。
	do{
		rem=d%2;
		d=d/2;
		a[i]=rem;
		i++;
	}while(d!=0);
//求余，将余数转移进数组a[30]结束。
	printf("经过计算，该数字对应的二进制数字是：");
	//倒输出正确顺序的数start
	while(i>0){
		printf("%d",a[--i]);
	}
	printf("\n");
	//倒输出正确顺序的数end
	system("pause");//按任意键继续函数
	system("cls");//清屏
}







//求平均分
/*************修改！该函数运行机制不符合要求**************/

/************bainesing最后修改于 2016年1月7日*************/

void qpjf(){
	int i;
	float a[7],max=0,min=10,sum=0;			//定义数组七位评委a[7]
	for(i=0;i<7;i++){
		printf("输入七位评委的打分\n");
		scanf("%f",&a[i]);					//输出七个评委分数
		if(max<a[i])max=a[i];				//比较大小，找出最大值
		if(min>a[i])min=a[i];
		sum+=a[i];							//把数组里面的七个分相加
	}
	printf("选手最后得分:%f\n",(sum-max-min)/5);			//把最大值最小值去掉求和

	system("pause");//按任意键继续函数
	system("cls");//清屏
}





//换钱方案

void hqfa(){
	int x,y,z,j=0;
	printf("以下是将十元钱换成5元、2元、1元的所有可行方案：\n");
	for(x=2;x>=0;x--){
		for(y=5;y>=0;y--){
			z=10-5*x-2*y;
			if(z>=0)
				printf("5元%d张，2元%d张，1元%d张\n",x,y,z);
		}
	}
	system("pause");//按任意键继续函数
	system("cls");//清屏
}






//电话查询系统

/************bainesing最后修改于 2016年1月7日*************/

void dhhm(){

	struct xinxi{//用户自定义数据类型，有两列数据：name姓名和tel电话。
		char name[30];
		char tel[20];
	};
	struct xinxi txl[50]={{"小红","15346824532"},{"小明","15318522025"},{"小刚","13245678900"}};//数据库初始化。共有50行数据，只定义了3行。
	char xm[20];
	int i;


	printf("请输入需要查找的姓名:");
	scanf("%s",xm);
	for(i=0;i<50;i++){//将50行数据全部比较一遍
		if(strcmp(txl[i].name,xm)==0){
			printf("%s的电话是：%s\n\n",txl[i].name,txl[i].tel);//输出信息。格式：txl[数据行].数据列
			break;
		}
	}
	if(i>=50)//条件的含义：50行数据全部比较了一遍，但没有符合条件的输出项。
		printf("系统找不到指定联系人\n\n");
	system("pause");//按任意键继续函数
	system("cls");//清屏
}
