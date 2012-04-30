git branch | sed 's/^\* \(.*\)/\1/' | egrep --regexp="^\w" > REVISION
git log -1 --pretty=format:%h%n%h%n%H%n%ci%n%an%n%ae%n%n%B%n >> REVISION