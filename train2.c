#include <stdio.h>
#include <stdlib.h>
#include <windows.h>
#include <conio.h>
#include <stdbool.h>

int platform;
int n_trains;

typedef struct {
    bool empty;
    int train_index;
} pf;

typedef struct {
    int id;
    int a_time;
    int r_time;
    int pn;
    bool arrived;
    bool left;
} train;

void getdata();
void simulate();

int main(void) {
    getdata();
    simulate();
    getch();
    return 0;
}

void getdata() {
    printf("=o=o==o= Automatic Train Platform Allocation Simulator =o=o==o=\n");
    printf("Enter the number of platforms: ");
    scanf("%d",&platform);
    if(platform<=0) {
        printf("Invalid number of platforms!!\n");
        getch();
        exit(0);
    }
    printf("Enter number of trains: ");
    scanf("%d",&n_trains);
    if(n_trains<=0) {
        printf("Invalid number of trains!!\n");
        getch();
        exit(0);
    }
}

void simulate() {
    int i,j,h,m;
    train trains[n_trains];

    for(i=0;i<n_trains;i++) {
        printf("\nEnter train[%d] id: ",i+1);
        scanf("%d",&trains[i].id);

        printf("Enter train[%d] arriving time (HH MM): ",i+1);
        scanf("%d %d",&h,&m);
        trains[i].a_time=h*60+m;

        printf("Enter train[%d] departure time (HH MM): ",i+1);
        scanf("%d %d",&h,&m);
        trains[i].r_time=h*60+m;

        if(trains[i].a_time>=trains[i].r_time) {
            printf("Invalid timings! Departure must be after arrival.\n");
            getch();
            exit(0);
        }

        trains[i].left=false;
        trains[i].arrived=false;
        trains[i].pn=-1;
    }

    pf pfs[platform];
    for(i=0;i<platform;i++) {
        pfs[i].empty=true;
        pfs[i].train_index=-1;
    }

    for(i=0;i<n_trains-1;i++) {
        for(j=i+1;j<n_trains;j++) {
            if(trains[i].a_time>trains[j].a_time) {
                train tmp=trains[i];
                trains[i]=trains[j];
                trains[j]=tmp;
            }
        }
    }

    int start_time=trains[0].a_time;
    int end_time=trains[0].r_time;

    for(i=0;i<n_trains;i++) {
        if(trains[i].a_time<start_time)
        start_time=trains[i].a_time;
        if(trains[i].r_time>end_time)
        end_time=trains[i].r_time;
    }

    printf("\nPress any key to start simulation...\n");
    getch();

    int t;
    for(t=start_time;t<=end_time;t++)
    {

        for(i=0;i<n_trains;i++)
        {
            if(!trains[i].left && trains[i].arrived && trains[i].r_time==t)
            {
                trains[i].left=true;
                if(trains[i].pn!=-1)
                {
                    pfs[trains[i].pn].empty=true;
                    pfs[trains[i].pn].train_index=-1;
                }
            }
        }

        for(i=0;i<n_trains;i++)
        {
            if(!trains[i].arrived && t>=trains[i].a_time)
            {
                trains[i].arrived=true;
                trains[i].pn=-1;
            }
        }

        for(i=0;i<n_trains;i++) {
            if(trains[i].arrived && !trains[i].left && trains[i].pn==-1) {
                for(j=0;j<platform;j++) {
                    if(pfs[j].empty) {
                        pfs[j].empty=false;
                        pfs[j].train_index=i;
                        trains[i].pn=j;
                        break;
                    }
                }
            }
        }

        system("cls");

        int curH=t/60;
        int curM=t%60;
        printf("=o=o==o= Automatic Train Platform Allocation Simulator =o=o==o=\n");
        printf("Current simulated time: %02d:%02d\n\n",curH,curM);

        printf("ID   Arr   Dep   Plat   Status\n");
        printf("---------------------------------------\n");

        for(i=0;i<n_trains;i++) {
            int ah=trains[i].a_time/60;
            int am=trains[i].a_time%60;
            int rh=trains[i].r_time/60;
            int rm=trains[i].r_time%60;

            printf("%3d  %02d:%02d  %02d:%02d  ",
                   trains[i].id,ah,am,rh,rm);

            if(trains[i].pn==-1) printf(" -    ");
            else printf("%3d   ",trains[i].pn+1);

            if(!trains[i].arrived) printf("Not arrived\n");
            else if(!trains[i].left && trains[i].pn==-1) printf("Waiting (no platform)\n");
            else if(!trains[i].left) printf("At platform\n");
            else printf("Left\n");
        }

        bool all_left=true;
        for(i=0;i<n_trains;i++) {
            if(!trains[i].left) {
                all_left=false;
                break;
            }
        }

        if(all_left) {
            printf("\nAll trains have left. Simulation complete.\n");
            break;
        }

        Sleep(500);
    }

    printf("\nPress any key to exit...\n");
    getch();
}
