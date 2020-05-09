M.block_efquicklist = {

    sesskey: null,

    /**
     * Init
     *
     * @param Y
     * @param instanceid
     * @param sesskey
     * @param displaymode
     * @param contextid
     */
    init: function(Y, instanceid, sesskey, displaymode, contextid) {
        this.Y = Y;
        this.sesskey = sesskey;
        this.instanceid = instanceid;
        this.displaymode = displaymode;
        this.contextid = contextid;

        this.progress = Y.one('#quickcourseprogress');
        this.xhr = null;

        Y.one('#efquicklistsearch').on('keyup', function(e) {
            var searchstring = e.target.get('value');
            this.search(searchstring);
        }, this);
        Y.one('#quickcourseform').on('submit', function(e) {
            e.preventDefault();
            var searchstring = e.target.getById('efquicklistsearch').get('value');
            this.search(searchstring);
        }, this);
    },

    /**
     * Search call
     * @param string
     */
    search: function(string) {

        var Y = this.Y;
        uri = M.cfg.wwwroot + '/blocks/efquicklist/quickcourse.php';
        if (this.xhr != null) {
            this.xhr.abort();
        }
        this.progress.setStyle('visibility', 'visible');
        var displaymode = this.displaymode;
        this.xhr = Y.io(uri, {
            data: 'course=' + string + '&instanceid=' + this.instanceid + '&sesskey=' + this.sesskey + '&contextid=' + this.contextid,
            context: this,
            on: {
                success: function(id, o) {
                    var courses = Y.JSON.parse(o.responseText);
                    list = Y.Node.create('<ul />');
                    if (courses.length > 0) {
                        Y.Array.each(courses, function(course) {
                            var monthNames = [
                                "January", "February", "March",
                                "April", "May", "June", "July",
                                "August", "September", "October",
                                "November", "December"
                            ];

                            var date = new Date(course.startdate * 1000);
                            var day = date.getDate();
                            var monthIndex = date.getMonth();
                            var year = date.getFullYear();

                            switch (displaymode) {
                                case '1':
                                    displaystr = course.shortname;
                                    break;
                                case '2':
                                    displaystr = course.fullname;
                                    break;
                                case '3':
                                    displaystr = course.shortname + ': ' + course.fullname;
                                    break;
                                //case '4': displaystr = course.fullname+' - '+ Y.util.Date.format(new Date(course.startdate * 1000), {format: "%d-%m-%Y"}); break;
                                case '4':
                                    displaystr = course.fullname + ' - ' + day + ' ' + monthNames[monthIndex] + ' ' + year;
                                    break;
                            }
                            Y.Node.create('<li><a href="' + M.cfg.wwwroot + '/course/view.php?id=' + course.id + '">' + displaystr + '</a></li>').appendTo(list);
                        });
                    }
                    Y.one('#efquicklist').replace(list);
                    list.setAttribute('id', 'efquicklist');
                    this.progress.setStyle('visibility', 'hidden');
                },

                /**
                 * failure
                 *
                 * @param id
                 * @param o
                 */
                failure: function(id, o) {
                    if (o.statusText != 'abort') {
                        this.progress.setStyle('visibility', 'hidden');
                        if (o.statusText !== undefined) {
                            var list = Y.Node.create('<p>' + o.statusText + '</p>');
                            Y.one('#efquicklist').replace(list);
                            list.set('id', 'efquicklist');
                        }
                    }
                }
            }
        });
    }
}
