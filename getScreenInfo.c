#include <stdlib.h>
#include <unistd.h>
#include <stdio.h>
#include <fcntl.h>
#include <linux/fb.h>
#include <sys/mman.h>
#include <sys/ioctl.h>

int main () {
    int fbfd = 0;
    struct fb_var_screeninfo vinfo;
    struct fb_fix_screeninfo finfo;
    long int screensize = 0;
    char *fbp = 0;
    int x = 0, y = 0;
    long int location = 0;

    fbfd = open("/dev/fb0", O_RDWR);
    if (fbfd == -1) {
        printf("run as root\n");
        exit(1);
    }

    if (ioctl(fbfd, FBIOGET_FSCREENINFO, &finfo) == -1) {
        exit(2);
    }

    if (ioctl(fbfd, FBIOGET_VSCREENINFO, &vinfo) == -1) {
        exit(3);
    }

    screensize = vinfo.xres * vinfo.yres * vinfo.bits_per_pixel / 8;

    printf("return [\"x\" => %d, \"y\" => %d, \"bpp\" => %d, \"screensizeBytes\" => %ld, \"xoffset\" => %d, \"yoffset\" => %d];\n", vinfo.xres, vinfo.yres, vinfo.bits_per_pixel, screensize, vinfo.xoffset, vinfo.yoffset);

    exit(0);
}