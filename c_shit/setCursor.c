#include <ncurses.h>
#include <stdio.h>

int main (int argc, char *argv[]) {
//    initscr();
//    cbreak();
//    keypad(stdscr, TRUE);
//    noecho();
    extern WINDOW *stdscr;
    move((int)argv[1], (int)argv[2]);
}