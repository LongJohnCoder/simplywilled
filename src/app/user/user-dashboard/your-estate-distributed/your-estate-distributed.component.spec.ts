import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { YourEstateDistributedComponent } from './your-estate-distributed.component';

describe('YourEstateDistributedComponent', () => {
  let component: YourEstateDistributedComponent;
  let fixture: ComponentFixture<YourEstateDistributedComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ YourEstateDistributedComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(YourEstateDistributedComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
