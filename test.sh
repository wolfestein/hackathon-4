#!/bin/sh

./lol.phar LevelA;
LEVELA=$?;
SCORE=0;
if [ $LEVELA = 0 ]; then
        SCORE=15;
fi

./lol.phar LevelB;
LEVELB=$?;
if [ $LEVELB = 0 ]; then
        SCORE=$((SCORE+15));
fi

./lol.phar LevelC;
LEVELC=$?;
if [ $LEVELC = 0 ]; then
        SCORE=$((SCORE+25));
fi

NAME='plop';
if [ $1 ]; then
        NAME=$1;
fi

DATE='000000';
if [ $2 ]; then
        DATE=$2
fi

echo "SCORE:"$SCORE
echo "$NAME;$DATE;$SCORE" >> /home/rduval/workspace/hackathon-dashboard/scores.csv
