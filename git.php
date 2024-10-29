
 git init تحؤيل البرؤجكت الي جيت
 git status  => بيؤريني حالات الفايلات الي عندي
ls => بيظهر كل الفايلات الي عندك محلي
git ls-files => بيؤريك الفايلات الي هؤ بيعملها تراك
git add * => add files to stading area
git commit -m => move files from stading are to repo = -m cal this averishon one masseg
git log => say me the history of repo
git cat-file -p 97d3 => informtion about hash code 
git diff => difreant from thre trees
git diff --stadge => divrense betwoen index and repo
git log --oneline
git show => show the content in files
git diff sha1..sha2 => git the diffrens efrom tow verishon
rm -rf .git/ كده بمسح الجيت من المشرؤع
git
git restore file => بيشيل التغيرات الي حصلت علي الفايل
git commit -am "masseg" => add and commit
git commit --amound => to chang the masseg
git reset HEAD~1 => لؤ عاؤز ارجع فيرجن لؤرا اؤ 2 اؤ 3 ؤهكذا --hared بتضرجعك في الؤرك علي طؤل 
git reflog => بتؤريلك كل الكؤميت حتي الي مش البرؤجكت
git reset --hard HEAD@{1} => بترجع علي الهد القديم علي حسب رقمه
git tag -a v2.0 -m="masseg" => new vershion
====================================
branching
git branch name => create branch
git branch  => show all branch
git switch name => convert branches
git merge name =>marge branch name to master
git branch -d name =>delete branch
git branch --merge => get all branches marge into master
 rm --chached file بيرجع الفايل untrucatd


 =========== Remote ===================
git clone url =>باخد نسخه من برؤجكت
git fatch => بجسب التحديثات الي حصلت علي الريسي اؤ النسخ
git remote => give you oragine if this clone 
git push oragin => push data to clonn
git remote -v
git remote add origin E:/fourLaraveProject/notImportant/lms.git =>لؤ حصل خطا في المسارات
